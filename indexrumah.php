<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS IIR</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>

    <style>
        table,
        th,
        td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <form action="indexrumah.php" method="POST">
        <input type="text" name="keyword" id="keyword"><br>
        <input type="radio" name="sumber" value="okezone" id="okezone" checked> Okezone
        <input type="radio" name="sumber" value="sindonews" id="sindonews"> Sindonews
        <input type="submit" name="search" value="Cari" id="search">
    </form>
    <table id="result">
        <!-- Title, Date, Category, LINK (ini tambahan) -->

        <tr>
            <th>News ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Description</th>
            <th>Link</th>
            <th>Prediction</th>
        </tr>

        <?php
        header("Access-Control-Allow-Origin: *");
        include_once('simple_html_dom.php');
        require_once __DIR__ . '/vendor/autoload.php';

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
                $result = extract_html($url);

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
                        $sql = "INSERT INTO news (title, category, date, link, summary) VALUES (?,?,?,?,?)";
                        $statement = $con->prepare($sql);
                        $statement->bind_param('sssss', $title, $category, $date, $link, $summary);
                        // Jalankan statementnya
                        $statement->execute();
                        $id += 1;
                    }
                }
            } else {
                //OKEZONE

                // Preprocess keyword
                $keyword = $_POST['keyword'];
                $query_keyword = str_replace(" ", "%20", $keyword);

                $url = "https://search.okezone.com/searchsphinx/loaddata/article/" . $query_keyword . "/0";
                //https://search.okezone.com/searchsphinx/loaddata/article/hacker%20bjorka/0
                $result = extract_html($url);

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
                        $statement->bind_param('sssss', $title, $category, $date, $link, $summary);
                        // Jalankan statementnya
                        $statement->execute();
                        $id += 1;
                    }
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
    </table>
    <a href="search.php">Search</a>
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