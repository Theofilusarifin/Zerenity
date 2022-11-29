<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row my-4">
            <div class="col">
                <h2>News Classification using Naive Bayes Numeric</h2>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <form action="predictrumah.php" method="POST">
                    <div class="row d-flex justify-content-flex-start">
                        <p class="mb-2">Input Keyword:</p>
                        <div class="col-8">
                            <div class="row">
                                <div class="col">
                                    <input type="text" style="width:100%" name="keyword" id="keyword">
                                </div>
                                <div class="col">
                                    <input type="submit" class="btn btn-sm btn-outline-primary px-4" name="search" value="Search">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <input type="radio" name="sumber" value="okezone" id="okezone" checked> Okezone
                            <input type="radio" name="sumber" value="sindonews" id="sindonews"> Sindonews
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        require_once __DIR__ . '/vendor/autoload.php';
        include_once('simple_html_dom.php');

        use Phpml\FeatureExtraction\TokenCountVectorizer;
        use Phpml\Tokenization\WhitespaceTokenizer;
        use Phpml\FeatureExtraction\TfIdfTransformer;
        use Phpml\Classification\NaiveBayes;

        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();
        $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopword = $stopwordFactory->createStopWordRemover();

        $training_title = array();
        $training_category = array();
        $con = new mysqli("localhost", "root", "", "uas_iir");
        // Lakukan pengecekan apakah terjadi koneksi yang error?
        if ($con->connect_errno) { // Kalau ada koneksi yang error
            // Melakukan echo terus memberhentikan proses
            die("Failed to connect to MYSQL:" . $con->connect_errno);
        }

        //Ambil data training di database
        $sql = "SELECT title, category FROM news";
        $statement = $con->prepare($sql);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Title yang diambil sudah di preprocess saat melakukan pencarian
                // Masukan kedalam array training
                array_push($training_title, $row['title']);
                array_push($training_category, $row['category']);
            }
        }
        ?>

        <?php
        // Proses Crawling
        // Array untuk process tf-idf title
        $preprocess_title = array();
        if (count($training_title) < 1) {
            die("Database kosong! Silahkan melakukan pencarian berita di halaman <a href='indexrumah.php'>Cari Berita</a>");
        }
        //Kalau button search di klik dan isi keywordnya tidak kosong
        if (isset($_POST['search']) && !empty($_POST['keyword'])) {
            // Preprocess keyword
            $keyword = $_POST['keyword'];
            $query_keyword = str_replace(" ", "+", $keyword);

            // Cek radio buttonnya
            if ($_POST['sumber'] == "sindonews") {
                $url = 'https://search.sindonews.com/go?type=artikel&q=' . $query_keyword;
                $result = extract_html($url);

                if ($result['code'] == '200') {
                    //CRAWLING PROSES
                    $html = new simple_html_dom();
                    $html->load($result['message']);
                    $id = 1;

                    foreach ($html->find('div[class="news-content"]') as $news) {
                        $title = $news->find('a', 0)->innertext;
                        // wajib ada tanda ^ karena fungsinya untuk memberikan indikasi attribut yang dicari berawalan ...
                        $category = $news->find('div[class^="newsc channel"]', 0)->innertext;
                        $date = $news->find('div[class="news-date"]', 0)->innertext;
                        $link = $news->find('a', 0)->href;
                        $summary = $news->find('div[class="news-summary"]', 0)->innertext;

                        //Preprocessing
                        $stemedTitle = $stemmer->stem($title);
                        $stopwordedTitle = $stopword->remove($stemedTitle);
                        $preprocess_title = $training_title;

                        // Push ke dalam array untuk di tf-idf
                        array_push($preprocess_title, $stopwordedTitle);

                        //TF-IDF
                        $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                        $tf->fit($preprocess_title);
                        $tf->transform($preprocess_title);

                        $tfidf = new TfIdfTransformer($preprocess_title);
                        $tfidf->transform($preprocess_title);

                        $title_prediction = $preprocess_title[count($preprocess_title) - 1];
                        array_pop($preprocess_title);

                        // Predict
                        $classifier = new NaiveBayes();
                        $classifier->train($preprocess_title, $training_category);
                        $result = $classifier->predict($title_prediction);

                        // Simpan database
                        $sql = "INSERT INTO analysis (fulltitle, title, category, date, link, summary, prediction) VALUES (?,?,?,?,?,?,?)";
                        $statement = $con->prepare($sql);
                        $statement->bind_param('sssssss', $title, $stopwordedTitle, $category, $date, $link, $summary, $result);
                        // Jalankan statementnya
                        $statement->execute();
                    }
                }
            } else {
                //OKEZONE
                // Preprocess keyword
                $keyword = $_POST['keyword'];
                $query_keyword = str_replace(" ", "%20", $keyword);

                // contoh linknya https://search.okezone.com//?q=coba
                $url = "https://search.okezone.com/searchsphinx/loaddata/article/" . $query_keyword . "/0";
                //https://search.okezone.com/searchsphinx/loaddata/article/hacker%20bjorka/0
                $result = extract_html($url);

                if ($result['code'] == '200') {
                    //CRAWLING PROSES
                    $html = new simple_html_dom();
                    $html->load($result['message']);
                    $id = 1;

                    foreach ($html->find('div[class="listnews"]') as $news) {
                        $title = $news->find('div[class="title"]', 0)->find('a', 0)->innertext;
                        $category = $news->find('div[class^="kanal"]', 0)->innertext;
                        $date = $news->find('div[class="tgl"]', 0)->innertext;
                        $link = $news->find('div[class="title"]', 0)->find('a', 0)->href;
                        $summary = $news->find('div[class="desc"]', 0)->innertext;

                        //Preprocessing
                        $stemedTitle = $stemmer->stem($title);
                        $stopwordedTitle = $stopword->remove($stemedTitle);
                        $preprocess_title = $training_title;

                        // Push ke dalam array untuk di tf-idf
                        array_push($preprocess_title, $stopwordedTitle);

                        //TF-IDF
                        $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                        $tf->fit($preprocess_title);
                        $tf->transform($preprocess_title);

                        $tfidf = new TfIdfTransformer($preprocess_title);
                        $tfidf->transform($preprocess_title);

                        $title_prediction = $preprocess_title[count($preprocess_title) - 1];
                        array_pop($preprocess_title);

                        // Predict
                        $classifier = new NaiveBayes();
                        $classifier->train($preprocess_title, $training_category);
                        $result = $classifier->predict($title_prediction);

                        // Simpan database
                        $sql = "INSERT INTO analysis (fulltitle, title, category, date, link, summary, prediction) VALUES (?,?,?,?,?,?,?)";
                        $statement = $con->prepare($sql);
                        $statement->bind_param('sssssss', $title, $stopwordedTitle, $category, $date, $link, $summary, $result);
                        // Jalankan statementnya
                        $statement->execute();
                    }
                }
            }
        }
        ?>
        <div class="row my-4">
            <div class="col">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr role="row">
                            <th class="text-center">News ID</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Summary</th>
                            <th class="text-center">Link</th>
                            <th class="text-center">Prediction</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = 1;
                        $sql_select = "SELECT * FROM analysis";
                        $res = $con->query($sql_select);
                        if ($res != null) {
                            while ($row = $res->fetch_assoc()) {
                                echo "<tr>";
                                echo ("<td>$id</td>");
                                echo "<td>" . $row['fulltitle'] . "</td>";
                                echo "<td>" . $row['category'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['summary'] . "</td>";
                                echo "<td><a href='" . $row['link'] . "'>Read More...</a></td>";
                                echo "<td>" . $row['prediction'] . "</td>";
                                echo ("</tr>");
                                $id++;
                            }
                        }
                        $con->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="nav-link" href="index.php">Go To Index Page</a>
            </div>
        </div>
    </div>
</body>

</html>

<?php
function extract_html($url)
{

    $response = array();

    $response['code'] = '';

    $response['message'] = '';

    $response['status'] = false;

    $agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1';

    // Some websites require referrer

    $host = parse_url($url, PHP_URL_HOST);

    $scheme = parse_url($url, PHP_URL_SCHEME);

    $referrer = $scheme . '://' . $host;

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_HEADER, false);

    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($curl, CURLOPT_URL, $url);

    curl_setopt($curl, CURLOPT_USERAGENT, $agent);

    curl_setopt($curl, CURLOPT_REFERER, $referrer);

    curl_setopt($curl, CURLOPT_COOKIESESSION, 0);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);

    curl_setopt($curl, CURLOPT_FAILONERROR, true);

    // allow to crawl https webpages

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    // the download speed must be at least 1 byte per second

    curl_setopt($curl, CURLOPT_LOW_SPEED_LIMIT, 1);

    // if the download speed is below 1 byte per second for more than 30 seconds curl will give up

    curl_setopt($curl, CURLOPT_LOW_SPEED_TIME, 30);

    $content = curl_exec($curl);

    //get the default response headers 
    header("Access-Control-Allow-Origin: *");

    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    $response['code'] = $code;

    if ($content === false) {

        $response['status'] = false;

        $response['message'] = curl_error($curl);
    } else {

        $response['status'] = true;

        $response['message'] = $content;
    }

    curl_close($curl);

    return $response;
}
?>