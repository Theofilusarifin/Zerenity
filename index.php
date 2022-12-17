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
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav mt-2">
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
                                        <div class="row d-flex justify-content-center no-gap" style="color:white">
                                            <div class="col-md-4 col-12">
                                                <h6 class="text-center">Select Distance Method:</h6>

                                                <div class="col-12 d-flex justify-content-center mt-2">
                                                    <input type="radio" name="metode" value="euclidean" id="euclidean" checked class="me-2"> Euclidean
                                                    <input type="radio" name="metode" value="chebyshev" id="chebyshev" class="ms-4 me-2"> Chebyshev
                                                </div>
                                            </div>
                                        </div>
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
                                    use Phpml\Math\Distance\Chebyshev;

                                    // Check keyword is not empty
                                    if (!empty($_POST['keyword'])) {
                                        require_once __DIR__ . '/vendor/autoload.php';

                                        // Initialize database connection
                                        $con = new mysqli("localhost", "root", "", "uas_iir");
                                        if ($con->connect_errno) {
                                            die("Failed to connect to MYSQL:" . $con->connect_errno);
                                        }

                                        // Define Variable
                                        $arr_training = array();
                                        $arr_title = array();
                                        $keyword = "%" . $_POST['keyword'] . "%";
                                        echo "<br><h6>Result for: " . $_POST['keyword'] . "</h6>";

                                        // Prepare SQL to get data from database
                                        $sql = "SELECT * FROM training WHERE title LIKE ?";
                                        $stmt = $con->prepare($sql);
                                        $stmt->bind_param("s", $keyword);
                                        $stmt->execute();
                                        $res = $stmt->get_result();

                                        if ($res->num_rows != 0){
                                            echo('<br><br>');
                                            // Fetch data from database querry
                                            while ($row = $res->fetch_assoc()) {
                                                array_push($arr_title, $row['title']); //memasukkan data di dalam array title
                                                $temp = array("title" => $row['title'], "date" => $row['date'], "category" => $row['category'], "portal" => $row['portal']);
                                                $arr_training[] = $temp;
                                                //Shape temp: ['title' -> 'samting', 'date' -> '2002/10/15', 'category' -> 'samting', 'portal' -> 'samting']
                                                //Shape arr_training: [['title' -> 'samting1', 'date' -> '2002/10/15', 'category' -> 'samting1', 'portal' -> 'samting1'], ['title' -> 'samting2', 'date' -> '2002/10/15', 'category' -> 'samting2', 'portal' -> 'samting2']....]
                                                //Access arr_training: co: arr_training[0]['title'] = samting1
                                            }

                                            // TF IDF Process
                                            $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                                            $tf->fit($arr_title);
                                            $tf->transform($arr_title);
                                            $tfidf = new TfIdfTransformer($arr_title);
                                            $tfidf->transform($arr_title);

                                            // Get Count Terms for Distance Calculation
                                            $terms_count = count($tf->getVocabulary());
                                            $arr_title_count = count($arr_title) - 1;

                                            // Euclidean Distance Calculation
                                            if ($_POST['metode'] == 'euclidean') {
                                                $euclidean = new Euclidean($terms_count - 1); //Membuat objek euclidean
                                                for ($i = 0; $i <= $arr_title_count; $i++) {
                                                    $arr_training[$i]['similarity'] = $euclidean->distance($arr_title[$i], $arr_title[$arr_title_count]); //push distance simmiliarity
                                                }
                                            }
                                            // Chebyshev Distance Calculation
                                            else if ($_POST['metode'] == 'chebyshev') {
                                                $chebyshev = new Chebyshev($terms_count - 1);//Membuat objek Chebyshev
                                                for ($i = 0; $i <= $arr_title_count; $i++) {
                                                    $arr_training[$i]['similarity'] = $chebyshev->distance($arr_title[$i], $arr_title[$arr_title_count]);//push distance simmiliarity
                                                }
                                            }

                                            // Sort similarity result using multisort
                                            $similarity_list = array_column($arr_training, 'similarity'); //Mengambil kolom dari arr_training bagian similary
                                            array_multisort($similarity_list, SORT_DESC, $arr_training);

                                            // Query Expansion
                                            if (count($arr_training) > 0) {
                                                $arr_expansion = array(); //Untuk menyimpan data td idf dari title yang ada di dalam data training
                                                $tfidf_score_total = array(); //Untuk menyimpan data tf idf untuk setiap keyword
                                                $top_k_retrieved = 0;

                                                // Define top k retrieved
                                                if (count($arr_training) < 3) {
                                                    $top_k_retrieved = count($arr_training); //Mengambil total k dari jumlah item di arr_training
                                                } else {
                                                    $top_k_retrieved = 3; //Minimal k adalah 3
                                                }

                                                // Assign top 3 title to array arr_expansion
                                                for ($i = 0; $i < $top_k_retrieved; $i++) { //Top k retrieved berfungsi untuk mendetailkan berapa total data yang akan diambil dari training data
                                                    $arr_expansion[] = $arr_training[$i]['title']; //Masukkan 3 title terbaik kedalam array arr_expansion
                                                }

                                                // TF IDF Process for Arr Expansion
                                                $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                                                $tf->fit($arr_expansion);
                                                $tf->transform($arr_expansion);
                                                $tfidf = new TfIdfTransformer($arr_expansion);
                                                $tfidf->transform($arr_expansion); //Untuk mengubah setiap kata yang ada di dalam arr expansion kedalam tfidf
                                                $term_list = $tf->getVocabulary(); //Untuk memasukkan tiap kata dari title arr_expansion kedalam array term_list

                                                // Define temp array for terms accumulation
                                                for ($i = 0; $i < count($term_list); $i++) {
                                                    $tfidf_score_total[$i] = 0; //Untuk mengisi data arr ini dengan nilai similiaritas 0 dari tiap kata dari array term_list (temp value: 0)
                                                }

                                                // Calculate terms accumulation
                                                for ($i = 0; $i < count($arr_expansion); $i++) { //Looping index dari arr_expansion
                                                    for ($j = 0; $j < count($term_list); $j++) { //Looping index dari score total dan index inti dari arr expansion
                                                        $tfidf_score_total[$j] += $arr_expansion[$i][$j]; //Untuk menambahkan nilai similiaritas dari setiap index (kata) dari array score_total menggunakan score dari array arr_expansion yang sudah di tfidf
                                                    }
                                                }

                                                // Sorting
                                                arsort($tfidf_score_total); //Mengurutkan value dari array score_total dari yang paling besar

                                                $get_max_based_index = 0;
                                                foreach ($tfidf_score_total as $key => $value) {
                                                    // Make sure query expansion is not the same with user search
                                                    if (strtolower($_POST['keyword']) != strtolower($term_list[$key])) { //Untuk mengecek apakah keyword yang di input user sama dengan array vocabulary
                                                        $query_expansion[] = $term_list[$key]; //untuk menambahkan data dari array vocabulary kedalam array querry_expansion
                                                        break;
                                                    }
                                                }

                                                // Display Query Expansion
                                                echo "<h6>Related keywords: </h6>";
                                                $explode_keyword = explode(" ", $_POST['keyword']); //Untuk memisahkan setiap kata yang ada di dalam keyword
                                                echo "<div class='d-flex my-4'>";

                                                for ($i = 0; $i <= count($explode_keyword); $i++) {
                                                    echo "<form action='expansion_form_$i' method='post'>"; //membuat form untuk setiap kata-kata yang berhasil di 'query expansion'

                                                    $temp = $explode_keyword;
                                                    array_splice($temp, $i, 0, $query_expansion); //Untuk membuat sebuah array dari potongan array query_expansion
                                                    $new_keyword = implode(" ", $temp); //Untuk mengambil kalimat dari setiap data yang ada di dalam array temp
                                                    
                                                    echo "<input type='hidden' name='keyword' value='" . $new_keyword . "'>";
                                                    $button = '<div class="main-border-button me-3" style="margin: 0; padding:0;">';
                                                    $button .= '<a href="" onclick="document.getElementById("expansion_form_' . $i . '").submit()">' . $new_keyword . '</a>';
                                                    $button .= '</div>';
                                                    echo $button;
                                                    echo "</form>";
                                                }
                                                echo "</div>";

                                                // Display Result in table
                                                foreach ($arr_training as $key => $value) { 
                                                    echo "<tr scope='row' class='text-center'>";
                                                    echo "<td class='text-center'>" .  ($key + 1) . "</td>";
                                                    echo "<td class='text-center'>" . $value['title'] . "</td>";
                                                    echo "<td class='text-center'>" . $value['date'] . "</td>";
                                                    echo "<td class='text-center'>" . $value['category'] . "</td>";
                                                    echo "<td class='text-center'>" . $value['portal'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            } 
                                        } else {
                                            echo "<br><h6>There is no data that match your search in our database</h6><br>";
                                        }
                                    }
                                    else{
                                        echo "<br><h6>Please input a keyword</h6><br>";
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