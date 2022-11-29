<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search News</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Jquerry -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://requirejs.org/docs/release/2.3.5/minified/require.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <style>
        input[type=text] {
            height: 100%;
            width: 100%;
            border: 1px solid #ec6090;
            border-radius: 10px;
            font-size: 18px;
            padding: 7px 10px;
            outline: none;
            color: #3C3F58;
        }

        td,
        tr,
        th {
            border: solid white 1px;
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/logo.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li><a href="crawling.php">Crawling</a></li>
                            <li><a href="classification.php">Classification</a></li>
                            <li><a href="evaluation.php">Evaluation</a></li>
                            <li style="display: none;"></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">

                    <!-- ***** Banner Start ***** -->
                    <div class="main-banner">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="header-text">
                                    <h6></h6>
                                    <h4><em>Let's</em> start news crawling here!</h4>
                                    <h6>IIR is our favorite subject!</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Banner End ***** -->

                    <div class="game-details">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Search Data</h2>
                            </div>
                            <div class="col-lg-12">
                                <form action="" id="find_form" method="POST">
                                    <div class="content">
                                        <div class="row pb-2 d-flex justify-content-center align-items-center no-gap ">
                                            <div class="col-8 pt-2">
                                                <div class="search-input">
                                                    <input type="text" placeholder="Type Something" name="keyword" id="keyword">
                                                </div>
                                            </div>
                                            <div class="col-2 mt-3">
                                                <div class="main-border-button" style="margin: 0; padding:0;">
                                                    <a href="#" onclick="document.getElementById('find_form').submit()">Find</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ***** Table Result Start ***** -->
                    <div class="gaming-library">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Data</em> Result</h4>
                            </div>
                            <table class="table table-borderless" style="color: white;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width:5%" class="text-center">#</th>
                                        <th scope="col" style="width:35%" class="text-center">Title</th>
                                        <th scope="col" style="width:20%" class="text-center">Category</th>
                                        <th scope="col" style="width:20%" class="text-center">Date</th>
                                        <th scope="col" style="width:20%" class="text-center">Portal</th>
                                    </tr>

                                </thead>
                                <tbody style="color: white;">
                                    <?php
                                    // contoh linknya https://search.okezone.com//?q=coba
                                    // contoh linknya https://search.sindonews.com/go?type=artikel&q=mau

                                    use Phpml\FeatureExtraction\TokenCountVectorizer;
                                    use Phpml\Tokenization\WhitespaceTokenizer;
                                    use Phpml\FeatureExtraction\TfIdfTransformer;
                                    use Phpml\Math\Distance\Euclidean;

                                    //Kalau button search di klik dan isi keywordnya tidak kosong
                                    if (!empty($_POST['keyword'])) {
                                        include_once('simple_html_dom.php');
                                        require_once __DIR__ . '/vendor/autoload.php';

                                        // DATABASE
                                        $con = new mysqli("localhost", "root", "", "uas_iir");
                                        // Lakukan pengecekan apakah terjadi koneksi yang error?
                                        if ($con->connect_errno) { // Kalau ada koneksi yang error
                                            // Melakukan echo terus memberhentikan proses
                                            die("Failed to connect to MYSQL:" . $con->connect_errno);
                                        }

                                        // Define Variable
                                        $training_data = array();
                                        $data_title = array();
                                        $keyword = "%" . $_POST['keyword'] . "%";
                                        echo "<br><h6>Result for: " . $_POST['keyword'] . "</h6><br><br>";

                                        // Prepare SQL to get data from database
                                        $sql = "SELECT * FROM news WHERE title LIKE ?";
                                        $stmt = $con->prepare($sql);
                                        $stmt->bind_param("s", $keyword);
                                        $stmt->execute();
                                        $res = $stmt->get_result();

                                        // Mendapatkan data dari hasil query database
                                        while ($row = $res->fetch_assoc()) {
                                            array_push($data_title, $row['title']);
                                            $temp = array("title" => $row['title'], "date" => $row['date'], "category" => $row['category'], "portal" => $row['portal']);
                                            $training_data[] = $temp;
                                        }

                                        // TF IDF Process
                                        $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                                        $tf->fit($data_title);
                                        $tf->transform($data_title);
                                        $tfidf = new TfIdfTransformer($data_title);
                                        $tfidf->transform($data_title);

                                        // Mendapatkan jumlah terms untuk dilakukannya kalkulasi euclidean Similarity dan mendapatkan jumlah dari isi array data_title setelah tfidf
                                        $terms_amount = count($tf->getVocabulary());
                                        $data_title_amount = count($data_title) - 1;

                                        // Lakukan euclidean Similarity
                                        $euclidean = new Euclidean($terms_amount - 1);
                                        for (
                                            $i = 0;
                                            $i <= $data_title_amount;
                                            $i++
                                        ) {
                                            $training_data[$i]['similarity'] = $euclidean->distance($data_title[$i], $data_title[$data_title_amount]);
                                        }

                                        // Mengurutkan hasil yang dicari berdasarkan similarity terbesar
                                        $similarity_list = array_column($training_data, 'similarity');
                                        array_multisort($similarity_list, SORT_DESC, $training_data);

                                        // Jika tidak ada data yang ditemukan, tidak perlu melakukan query expansion
                                        if (count($training_data) > 0) {
                                            $expansion_data = array();
                                            $tfidf_score_accumulation = array();
                                            $top_k_retrieved = 0;

                                            // Menentukan Nilai Top K Retrieved
                                            if (count($training_data) < 3) {
                                                $top_k_retrieved = count($training_data);
                                            } else {
                                                $top_k_retrieved = 3;
                                            }

                                            // Mengisi array expansion_data dengan 3 title teratas
                                            for ($i = 0; $i < $top_k_retrieved; $i++) {
                                                $expansion_data[] = $training_data[$i]['title'];
                                            }

                                            // TF IDF
                                            $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                                            $tf->fit($expansion_data);
                                            $tf->transform($expansion_data);
                                            $tfidf = new TfIdfTransformer($expansion_data);
                                            $tfidf->transform($expansion_data);
                                            $term_list = $tf->getVocabulary();

                                            // Deklarasi bahwa isi array 1D ini dengan 0 sebanyak jumlah term yang tersedia
                                            for ($i = 0; $i < count($term_list); $i++) {
                                                $tfidf_score_accumulation[$i] = 0;
                                            }

                                            // Lakukan akumulasi weight tiap terms nya
                                            for ($i = 0; $i < count($expansion_data); $i++) {
                                                for ($j = 0; $j < count($term_list); $j++) {
                                                    $tfidf_score_accumulation[$j] += $expansion_data[$i][$j];
                                                }
                                            }

                                            // Lakukan pengurutan
                                            arsort($tfidf_score_accumulation);

                                            $get_max_based_index = 0;
                                            foreach ($tfidf_score_accumulation as $key => $value) {
                                                // Memastikan query expansion tidak sama dengan yang di search user
                                                if (strtolower($_POST['keyword']) != strtolower($term_list[$key])) {
                                                    $query_expansion[] = $term_list[$key];
                                                    break;
                                                }
                                            }

                                            // Menampilkan keyword tambahan berdasarkan query expansion
                                            echo "<h6>Related keywords: </h6>";
                                            $explode_keyword = explode(" ", $_POST['keyword']);
                                            echo "<div class='d-flex my-4'>";

                                            for ($i = 0; $i <= count($explode_keyword); $i++) {
                                                echo "<form action='expansion_form_$i' method='post'>";

                                                $temp = $explode_keyword;
                                                array_splice($temp, $i, 0, $query_expansion);
                                                $new_keyword = implode(" ", $temp);

                                                echo "<input type='hidden' name='keyword' value='" . $new_keyword . "'>";
                                                $button = '<div class="main-border-button me-3" style="margin: 0; padding:0;">';
                                                $button .= '<a href="" onclick="document.getElementById("expansion_form_' . $i . '").submit()">' . $new_keyword . '</a>';
                                                $button .= '</div>';
                                                echo $button;
                                                echo "</form>";
                                            }
                                            echo "</div>";

                                            // Menampilkan hasil pada tabel secara terurut
                                            foreach ($training_data as $key => $value ) {
                                                echo "<tr>";
                                                echo "<td>" .  ($key+1) . "</td>";
                                                echo "<td>" . $value['title'] . "</td>";
                                                echo "<td>" . $value['date'] . "</td>";
                                                echo "<td>" . $value['category'] . "</td>";
                                                echo "<td>" . $value['portal'] . "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- ***** Table Result End ***** -->
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2022 <a href="#">Zerenity</a> All rights reserved.</p>
                    <ul style="color:white" class="d-flex justify-content-between">
                        <a href="" target="_blank">Hans Wirjawan</a>
                        <a href="" target="_blank">Henri Jayanata</a>
                        <a href="https://www.linkedin.com/in/theofilusarifin/" target="_blank">Theofilus Arifin</a>
                        <a href="" target="_blank">Muhammad Ikhsan</a>
                        <a href="" target="_blank">Christian Yaska</a>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>

</body>


</html>