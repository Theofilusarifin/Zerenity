<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS IIR</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        table,
        th,
        td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row my-4">
            <div class="col">
                <h2>Project IIR</h2>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <form action="index.php" method="POST">
                    <div class="row d-flex justify-content-flex-start">
                        <p class="mb-2">Input Keyword:</p>
                        <div class="col-8">
                            <div class="row">
                                <div class="col">
                                    <input type="text" style="width:100%" name="keyword" id="keyword">
                                </div>
                                <div class="col">
                                    <input type="submit" class="btn btn-sm btn-outline-primary px-4" name="search" value="Search" id="search">
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
        <div class="row my-4">
            <div class="col">
                <table class="table table-striped" id="result">
                    <!-- Title, Date, Category, LINK (ini tambahan) -->
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
                        header("Access-Control-Allow-Origin: *");
                        include_once('simple_html_dom.php');
                        include_once('extract_html.php');
                        require_once __DIR__ . '/vendor/autoload.php';
                        $proxy = 'proxy3.ubaya.ac.id:8080';

                        use Phpml\Classification\NaiveBayes;
                        use Phpml\FeatureExtraction\TokenCountVectorizer;
                        use Phpml\Tokenization\WhitespaceTokenizer;
                        use Phpml\FeatureExtraction\TfIdfTransformer;
                        // contoh linknya https://search.okezone.com//?q=coba
                        // contoh linknya https://search.sindonews.com/go?type=artikel&q=mau

                        //Kalau button search di klik dan isi keywordnya tidak kosong
                        if (isset($_POST['search']) && !empty($_POST['keyword'])) {

                            // DATABASE
                            $con = new mysqli("localhost", "root", "", "uas_iir");
                            // Lakukan pengecekan apakah terjadi koneksi yang error?
                            if ($con->connect_errno) { // Kalau ada koneksi yang error
                                // Melakukan echo terus memberhentikan proses
                                die("Failed to connect to MYSQL:" . $con->connect_errno);
                            }

                            // Preprocess keyword
                            $keyword = $_POST['keyword'];
                            $query_keyword = str_replace(" ", "+", $keyword);

                            // Cek radio buttonnya
                            if ($_POST['sumber'] == "sindonews") {
                                $url = 'https://search.sindonews.com/go?type=artikel&q=' . $query_keyword;
                                $result = extract_html($url, $proxy);

                                if ($result['code'] == '200') {
                                    //CRAWLING PROSES
                                    $sample_data = array();
                                    // $html = file_get_html($url);
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

                                        array_push($sample_data, $title);

                                        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                                        $stemmer = $stemmerFactory->createStemmer();
                                        $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
                                        $stopword = $stopwordFactory->createStopWordRemover();

                                        $stemedTitle = $stemmer->stem($title);
                                        $stopwordedTitle = $stopword->remove($stemedTitle);

                                        //INSERT DATABASE
                                        // $sql = "INSERT INTO news (title, category, date, link, summary) VALUES (?,?,?,?,?)";
                                        // $statement = $con->prepare($sql);
                                        // $statement->bind_param('sssss', $stopwordedTitle, $category, $date, $link, $summary);
                                        // // Jalankan statementnya
                                        // $statement->execute();
                                    }

                                    // $con->close();
                                }
                            } else {
                                //OKEZONE
                                // Preprocess keyword
                                $keyword = $_POST['keyword'];
                                $query_keyword = str_replace(" ", "%20", $keyword);

                                // contoh linknya https://search.okezone.com//?q=coba
                                $url = "https://search.okezone.com/searchsphinx/loaddata/article/" . $query_keyword . "/0";
                                //https://search.okezone.com/searchsphinx/loaddata/article/hacker%20bjorka/0
                                $result = extract_html($url, $proxy);

                                if ($result['code'] == '200') {
                                    //CRAWLING PROSES
                                    $sample_data = array();
                                    // $html = file_get_html($url);
                                    $html = new simple_html_dom();
                                    $html->load($result['message']);
                                    $id = 1;

                                    foreach ($html->find('div[class="listnews"]') as $news) {
                                        $title = $news->find('div[class="title"]', 0)->find('a', 0)->innertext;
                                        $category = $news->find('div[class^="kanal"]', 0)->innertext;
                                        $date = $news->find('div[class="tgl"]', 0)->innertext;
                                        $link = $news->find('div[class="title"]', 0)->find('a', 0)->href;
                                        $summary = $news->find('div[class="desc"]', 0)->innertext;

                                        array_push($sample_data, $title);

                                        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                                        $stemmer = $stemmerFactory->createStemmer();
                                        $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
                                        $stopword = $stopwordFactory->createStopWordRemover();

                                        $stemedTitle = $stemmer->stem($title);
                                        $stopwordedTitle = $stopword->remove($stemedTitle);

                                        //INSERT DATABASE
                                        $sql = "INSERT INTO news (title, category, date, link, summary) VALUES (?,?,?,?,?)";
                                        $statement = $con->prepare($sql);
                                        $statement->bind_param('sssss', $stopwordedTitle, $category, $date, $link, $summary);
                                        // Jalankan statementnya
                                        $statement->execute();
                                    }

                                    // $con->close();
                                }
                            }

                            $arrayTitle = [];
                            $arrayCategory = [];
                            $arrayDate = [];
                            $arraySummary = [];
                            $arrayLink = [];
                            $arrayHasil = [];

                            $sql = "SELECT * FROM news";
                            $statement = $con->prepare($sql);
                            $statement->execute();
                            $result = $statement->get_result();
                            while ($row = $result->fetch_assoc()) {
                                array_push($arrayTitle, $row['title']);
                                array_push($arrayCategory, $row['category']);
                                array_push($arrayDate, $row['date']);
                                array_push($arrayLink, $row['link']);
                                array_push($arraySummary, $row['summary']);
                            }

                            for ($i = 0; $i < count($arrayTitle); $i++) {
                                $arraySample = $arrayTitle;
                                $arrayPredict = [];
                                $selected_judul = $arrayTitle[$i];
                                array_push($arraySample, $arrayTitle[$i]);

                                $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                                $tf->fit($arraySample);
                                $tf->transform($arraySample);
                                $vocabulary = $tf->getVocabulary();

                                $tfidf = new TfIdfTransformer($arraySample);
                                $tfidf->transform($arraySample);

                                $panjang = count($arraySample);
                                array_push($arrayPredict, $arraySample[$panjang - 1]);
                                array_pop($arraySample);

                                $id = $i + 1;
                                $category = $arrayCategory[$i];
                                $date = $arrayDate[$i];
                                $summary = $arraySummary[$i];
                                $link = $arrayLink[$i];


                                $classifier = new NaiveBayes();
                                $classifier->train($arraySample, $arrayCategory);
                                $result = $classifier->predict($arrayPredict);

                                array_push($arrayHasil, $result[0]);

                                echo ("<tr>");
                                echo ("<td>$id</td>");
                                echo ("<td>$selected_judul</td>");
                                echo ("<td>$category</td>");
                                echo ("<td>$date</td>");
                                echo ("<td>$summary</td>");
                                echo ("<td><a href='$link'>Read More...</a></td>");
                                echo ("<td>" . $result[0] . "</td>");
                                echo ("</tr>");
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="nav-link" href="search.php">Go To Search Page</a>
            </div>
        </div>
    </div>
</body>

</html>