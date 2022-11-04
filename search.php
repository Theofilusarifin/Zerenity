<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>News Searching</h3>
    <form method="POST" action="search.php">
        <p class="lead">Input Keyword <input type="text" name="keyword">
            <input type="submit" name="search" value="Search"><br>
        </p>
    </form>

    <?php
    require_once __DIR__ . '/vendor/autoload.php';
    include_once('simple_html_dom.php');
    include_once('extract_html.php');

    use Phpml\FeatureExtraction\TokenCountVectorizer;
    use Phpml\Tokenization\WhitespaceTokenizer;
    use Phpml\FeatureExtraction\TfIdfTransformer;

    //pengecekan isset disini
    if (isset($_POST['search'])) {

        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();
        $stopwordFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopword = $stopwordFactory->createStopWordRemover();

        $sample_data = array();
        $title = array();
        $con = new mysqli("localhost", "root", "", "news");
        // Lakukan pengecekan apakah terjadi koneksi yang error?
        if ($con->connect_errno) { // Kalau ada koneksi yang error
            // Melakukan echo terus memberhentikan proses
            die("Failed to connect to MYSQL:" . $con->connect_errno);
        }
        $sql = "SELECT title FROM contents";
        $statement = $con->prepare($sql);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Stemmer dan Stopword
                $output = $stemmer->stem($row['title']);
                $output = $stopword->remove($output);

                // Masukin hasil query ke array title, masukin hasil stopword ke sample_data
                array_push($title, $row['title']);
                array_push($sample_data, $output);
            }
            // AMBIL POST keywordpencarian dari halaman 
            $output = $stemmer->stem($_POST["keyword"]);
            $output = $stopword->remove($output);
            array_push($sample_data, $output);
        }
    ?>

    <?php
        // TF
        $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
        $tf->fit($sample_data);
        $tf->transform($sample_data);

        // TF IDF
        $tfidf = new TfIdfTransformer($sample_data);
        $tfidf->transform($sample_data);

        $query_idx = count($sample_data) - 1;
        // COSINE
        for ($i = 0; $i < $query_idx; $i++) {
            $numerator = 0.0;
            $denom_wkq = 0.0;
            $denom_wkj = 0.0;

            for ($x = 0; $x < count($sample_data[$i]); $x++) {
                $numerator += $sample_data[$query_idx][$x] * $sample_data[$i][$x];
                $denom_wkq += pow($sample_data[$query_idx][$x], 2);
                $denom_wkj += pow($sample_data[$i][$x], 2);
            }

            $result = $numerator / sqrt($denom_wkq * $denom_wkj);
            if (sqrt($denom_wkq * $denom_wkj) != 0) {
            } else {
                $result = 0;
            }

            // UPDATE SQL
            $sql = "UPDATE contents SET similarity = ? WHERE title = ?";
            $statement = $con->prepare($sql);
            $similarity = round($result, 2);
            $statement->bind_param('ds', $similarity, $title[$i]);
            // Jalankan statementnya
            $statement->execute();
        }

        // JACCARD
        // for ($i = 0; $i < $query_idx; $i++) {
        //     $numerator = 0.0;
        //     $denom_wkq = 0.0;
        //     $denom_wkj = 0.0;
        //     $denom_wkq_wkj = 0.0;

        //     for ($x = 0; $x < count($sample_data[$i]); $x++) {
        //         $numerator += $sample_data[$query_idx][$x] * $sample_data[$i][$x];
        //         $denom_wkq += pow($sample_data[$query_idx][$x], 2);
        //         $denom_wkj += pow($sample_data[$i][$x], 2);
        //         $denom_wkq_wkj += $sample_data[$query_idx][$x] * $sample_data[$i][$x];
        //     }

        //     if ($denom_wkq + $denom_wkj - $denom_wkq_wkj != 0
        //     ) {
        //         $result = $numerator / ($denom_wkq + $denom_wkj - $denom_wkq_wkj);
        //     } else {
        //         $result = 0;
        //     }
        //     // UPDATE SQL
        //     $sql = "UPDATE contents SET similarity = ? WHERE title = ?";
        //     $statement = $con->prepare($sql);
        //     $similarity = round($result, 2);
        //     $statement->bind_param('ds', $similarity, $title[$i]);
        //     // Jalankan statementnya
        //     $statement->execute();
        // }

        // Close Koneksi
        $con->close();
    }

    ?>
    <table border="2">
        <tr>
            <th align="center">Title</th>
            <th align="center">Link</th>
            <th align="center">Similarity Score</th>
        </tr>
        <?php
        if (isset($_POST['search'])){
            $con = new mysqli("localhost", "root", "", "news");
            $sql_select = "SELECT title, link, similarity FROM contents ORDER BY similarity DESC";
            $res = $con->query($sql_select);
            if ($res != null) {
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['link'] . "</td>";
                    echo "<td>" . $row['similarity'] . "</td>";
                    echo "</tr>";
                }
            }
            $con->close();
        }
        ?>
    </table>
</body>

</html>