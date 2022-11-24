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
                <h2>News Searching</h2>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <form action="search.php" method="POST">
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
                </form>
            </div>
        </div>
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
        <div class="row my-4">
            <div class="col">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr role="row">
                            <th class="text-center" width="40%">Title</th>
                            <th class="text-center" width="30%">Link</th>
                            <th class="text-center" width="30%">Similarity Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['search'])) {
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