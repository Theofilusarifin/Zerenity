<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS IIR</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <form action="index.php" method="POST">
        <input type="text" name="keyword"><br>
        <input type="radio" name="sumber" value="okezone" checked> Okezone
        <input type="radio" name="sumber" value="sindonews"> Sindonews
        <input type="submit" name="search" value="Cari">
    </form>
    <table>
        <!-- Title, Date, Category, LINK (ini tambahan) -->

        <tr>
            <th>News ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Link</th>
        </tr>

        <?php
        include_once('simple_html_dom.php');
        include_once('extract_html.php');
        require_once __DIR__ . '/vendor/autoload.php';

        use Phpml\Clustering\KMeans;
        use Phpml\FeatureExtraction\TokenCountVectorizer;
        use Phpml\Tokenization\WhitespaceTokenizer;
        use Phpml\FeatureExtraction\TfIdfTransformer;

        $proxy = 'proxy3.ubaya.ac.id:8080';
        // contoh linknya https://search.okezone.com//?q=coba
        // contoh linknya https://search.sindonews.com/go?type=artikel&q=mau

        //Kalau button search di klik dan isi keywordnya tidak kosong
        if (isset($_POST['search']) && !empty($_POST['keyword'])) {

            // DATABASE
            // $con = new mysqli("localhost", "root", "", "news");
            // // Lakukan pengecekan apakah terjadi koneksi yang error?
            // if ($con->connect_errno) {
            //     // Melakukan echo terus memberhentikan proses
            //     die("Failed to connect to MYSQL:" . $con->connect_errno);
            // }

            // Preprocess keyword
            $keyword = $_POST['keyword'];
            $query_keyword = str_replace(" ", "+", $keyword);

            // Cek radio buttonnya
            $url = 'https://search.okezone.com//?q=' . $query_keyword;
            if ($_POST['sumber'] == "sindonews") {
                $url = 'https://search.sindonews.com/go?type=artikel&q=' . $query_keyword;
            }
            // Proxy Ubaya
            $result = extract_html($url, $proxy);

            //CRAWLING PROSES
            if ($result['code'] == '200') {
                // Kalau mau tambahin pengecekan isset disini
                $sample_data = array();
                $html = new simple_html_dom();
                $html->load($result['message']);
                $id = 0;

                //OKEZONE
                if ($_POST['sumber'] == "okezone") {
                    foreach ($html->find('div[class="listnews"]') as $news) {
                        $title = $news->find('div[class="title"]', 0)->find('a',0)->innertext;
                        $category = $news->find('div[class^="kanal"]', 0)->innertext;
                        $date = $news->find('div[class="tgl"]', 0)->innertext;
                        $link = $news->find('div[class="title"]', 0)->find('a', 0)->href;
                        // $summary = $news->find('div[class="desc"]')->innertext;

                        array_push($sample_data, $title);

                        // $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                        // $stemmer = $stemmerFactory->createStemmer();
                        // $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
                        // $stopword = $stopwordFactory->createStopWordRemover();

                        // $stemedTitle = $stemmer->stem($newsTitle);
                        // $stopwordedTitle = $stopword->remove($stemedTitle);

                        echo ("<tr>");
                        echo ("<td>$id</td>");
                        echo ("<td>$title</td>");
                        echo ("<td>$category</td>");
                        echo ("<td>$date</td>");
                        echo ("<td><a href='$link'>Read More...</a></td>");
                        echo ("</tr>");

                        //INSERT DATABASE
                        // $sql = "INSERT INTO contents (title, link, similarity) VALUES (?,?,?)";
                        // $statement = $con->prepare($sql);
                        // $similarity = 0.0;
                        // $statement->bind_param('ssd', $title, $link, $similarity);
                        // Jalankan statementnya
                        // $statement->execute();
                        $id += 1;
                    }
                //SINDONEWS
                } else {
                    foreach ($html->find('div[class="news-content"]') as $news) {

                        $title = $news->find('a', 0)->innertext;
                        // wajib ada tanda ^ karena fungsinya untuk memberikan indikasi attribut yang dicari berawalan ...
                        $category = $news->find('div[class^="newsc channel"]', 0)->innertext;
                        $date = $news->find('div[class="news-date"]', 0)->innertext;
                        $link = $news->find('a', 0)->href;
                        // $summary = $news->find('div[class="news-summary"]')->innertext;

                        array_push($sample_data, $title);

                        // $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
                        // $stemmer = $stemmerFactory->createStemmer();
                        // $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
                        // $stopword = $stopwordFactory->createStopWordRemover();

                        // $stemedTitle = $stemmer->stem($newsTitle);
                        // $stopwordedTitle = $stopword->remove($stemedTitle);

                        echo ("<tr>");
                        echo ("<td>$id</td>");
                        echo ("<td>$title</td>");
                        echo ("<td>$category</td>");
                        echo ("<td>$date</td>");
                        echo ("<td><a href='$link'>Read More...</a></td>");
                        echo ("</tr>");

                        //INSERT DATABASE
                        // $sql = "INSERT INTO contents (title, link, similarity) VALUES (?,?,?)";
                        // $statement = $con->prepare($sql);
                        // $similarity = 0.0;
                        // $statement->bind_param('ssd', $title, $link, $similarity);
                        // Jalankan statementnya
                        // $statement->execute();
                        $id += 1;
                    }
                }
            }
            // $con->close();
        }
        ?>
    </table>

    <?php
    // $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
    // $tf->fit($sample_data);
    // $tf->transform($sample_data);
    // $vocabulary = $tf->getVocabulary();

    // $tfidf = new TfIdfTransformer($sample_data);
    // $tfidf->transform($sample_data);

    // //angka 3 diganti input nanti
    // $kmeans = new KMeans(10);
    // $result = $kmeans->cluster($sample_data);

    // echo "<br><br><b><u>Clustering Result</u></b><br><br>";
    // echo "<table border='1'>";
    // foreach ($result as $cluster => $doc) {
    //     $join = array();
    //     foreach ($doc as $key => $value) {
    //         array_push($join, $sample_data[$key]);
    //     }
    //     $b = 0;
    //     foreach ($join as $val) {
    //         foreach ($val as $key => $val1) {
    //             if ($val1 > $b) {
    //                 $b = $val1;
    //                 $idx = $key;
    //             }
    //         }
    //     }

    //     echo "<tr>";
    //     echo "<th>Cluster " . $vocabulary[$idx] . "</th>";
    //     foreach ($doc as $key => $value) {
    //         echo "<td>News-" . $key . "</td>";
    //     }
    //     echo "</tr>";
    // }
    // echo "</table>";
    ?>

    <a href="search.php">Search</a>
</body>

</html>