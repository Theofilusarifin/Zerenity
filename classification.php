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
                            <li><a href="index.php">Home</a></li>
                            <li><a href="crawling.php">Crawling</a></li>
                            <li><a href="classification.php" class="active">Classification</a></li>
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
                    <div class="game-details">
                        <div class="row">
                            <div class="col-12">
                                <h2 style="margin-top: 0;">Classification</h2>
                            </div>
                            <div class="col-lg-12">
                                <form action="" id="classification_form" method="POST">
                                    <div class="content">
                                        <div class="row d-flex justify-content-center no-gap" style="color:white">
                                            <div class="col-md-4 col-12">
                                                <h6 class="text-center">Select Source:</h6>
                                                <div class="col-12 d-flex justify-content-center mt-2">
                                                    <input type="radio" name="sumber" value="okezone" id="okezone" checked class="me-2"> Okezone
                                                    <input type="radio" name="sumber" value="sindonews" id="sindonews" class="ms-4 me-2"> Sindonews
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3 d-flex justify-content-center align-items-center no-gap ">
                                            <div class="col-8 pt-2">
                                                <div class="search-input">
                                                    <input type="text" placeholder="Type Something" name="keyword" id="keyword">
                                                </div>
                                            </div>
                                            <div class="col-2 mt-3">
                                                <div class="main-border-button" style="margin: 0; padding:0;">
                                                    <a href="#" onclick="document.getElementById('classification_form').submit()">Find</a>
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
                                <h4><em>Classification</em> Result</h4>
                            </div>
                            <table class="table table-borderless" style="color: white;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width:30%" class="text-center">Title</th>
                                        <th scope="col" style="width:20%" class="text-center">Date</th>
                                        <th scope="col" style="width:25%" class="text-center">Original Category</th>
                                        <th scope="col" style="width:25%" class="text-center">System Classification</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    //Import library
                                    use Phpml\FeatureExtraction\TokenCountVectorizer;
                                    use Phpml\Tokenization\WhitespaceTokenizer;
                                    use Phpml\FeatureExtraction\TfIdfTransformer;
                                    use Phpml\Classification\NaiveBayes;

                                    // Check keyword is not empty
                                    if (!empty($_POST['keyword'])) {
                                        include_once('simple_html_dom.php');
                                        require_once __DIR__ . '/vendor/autoload.php';

                                        // Initialize database connection
                                        $con = new mysqli("localhost", "root", "", "uas_iir");
                                        if ($con->connect_errno) {
                                            die("Failed to connect to MYSQL:" . $con->connect_errno);
                                        }

                                        // Define Variable
                                        $keyword = $_POST['keyword']; //keyword dari user
                                        $query_keyword = str_replace(" ", "+", $keyword); //Mengganti keyword menjadi kalimat yang lebih pas untuk melakukan query pada web crawling
                                        $portal = $_POST['sumber']; //menentukan portal sumber nya

                                        $arr_crawling = array(); //Menyimpan data crawling
                                        //Bentuk arr crawling: [[0][[title] => "samting", [category] => "samting", [classification] => "samting"]]
                                        // Okezone
                                        if ($portal == "okezone") {
                                            //Crawling okezone
                                            $url = "https://search.okezone.com/searchsphinx/loaddata/article/" . $query_keyword . "/0";
                                            $result = extract_html($url);

                                            if ($result['code'] == '200') {
                                                $html = new simple_html_dom();
                                                $html->load($result['message']);

                                                $id = 1;
                                                // Crawling Process
                                                foreach ($html->find('div[class="listnews"]') as $news) {
                                                    $title = $news->find('div[class="title"]', 0)->find('a', 0)->innertext;
                                                    $category = $news->find('div[class^="kanal"]', 0)->innertext;
                                                    $date = $news->find('div[class="tgl"]', 0)->innertext;

                                                    $temp = array("title" => $title, "date" => $date, "category" => $category, "classification" => "");  //initialize array
                                                    $arr_crawling[] = $temp; //Menambahkan temp kedalam arr_crawling

                                                    $id++;
                                                    if ($id > 5) { //Untuk menyortir hanya 5 data yang di crawling
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                        // Sindonews
                                        else if ($portal == "sindonews") {
                                            $url = 'https://search.sindonews.com/go?type=artikel&q=' . $query_keyword;
                                            $result = extract_html($url);

                                            if ($result['code'] == '200') {
                                                $html = new simple_html_dom();
                                                $html->load($result['message']);

                                                $id = 1;
                                                // Crawling Process
                                                foreach ($html->find('div[class="news-content"]') as $news) {
                                                    $title = $news->find('a', 0)->innertext;
                                                    $category = $news->find('div[class^="newsc channel"]', 0)->innertext;
                                                    $date = $news->find('div[class="news-date"]', 0)->innertext;

                                                    $temp = array("title" => $title, "date" => $date, "category" => $category, "classification" => "");//initialize array
                                                    $arr_crawling[] = $temp;//Menambahkan temp kedalam arr_crawling

                                                    $id++;
                                                    if ($id > 5) {
                                                        break;
                                                    }
                                                }
                                            }
                                        }

                                        // Naive Bayes Process
                                        $ids = 0; //Sebagai penunjuk index untuk mengakses arr_crawling
                                        foreach ($arr_crawling as $key => $value) {
                                            // Get data from training
                                            $sql = "SELECT * FROM training";
                                            $res = $con->query($sql);

                                            $arr_sample_title = array(); //Menyimpan data title dari database
                                            $arr_sample_category = array(); //Menyimpan data kategori dari database

                                            //Proses pengisian data title dan kategori kedalam array arr_sample_title dan arr_sample_category
                                            while ($row = $res->fetch_assoc()) {
                                                array_push($arr_sample_title, $row['title']); 
                                                array_push($arr_sample_category, $row['category']);
                                            }

                                            $count_data = count($arr_sample_category) / 2; //mendapatkan total data
                                            array_push($arr_sample_title, $value['title']); //menempatkan title dari data crawling pada index terakhir untuk perhitungan naive bayes

                                            //Pembuatan table
                                            echo "<tr scope='row' class='text-center'>";
                                            echo "<td class='text-center'>" . $value['title'] . "</td>";
                                            echo "<td class='text-center'>" . $value['date'] . "</td>";
                                            echo "<td class='text-center'>" . $value['category'] . "</td>";

                                            //Perhitungan tf-idf dari array title
                                            $tf = new TokenCountVectorizer(new WhitespaceTokenizer());
                                            $tf->fit($arr_sample_title);
                                            $tf->transform($arr_sample_title);
                                            $tfidf = new TfIdfTransformer($arr_sample_title);
                                            $tfidf->transform($arr_sample_title);

                                            foreach ($arr_sample_title[(count($arr_sample_title) - 1)] as $key => $value) { //Untuk mengambil array dari title hasil dari crawling
                                                $new_data[] = $value; //Menambahkan title yang sudah di tf idf kedalam variabel new_data
                                            }
                                            array_pop($arr_sample_title); //Menghapus data crawling dari sample title

                                            // Do Naive Bayes Classification Method
                                            $classifier = new NaiveBayes($count_data);
                                            $classifier->train($arr_sample_title, $arr_sample_category); //melakukan training
                                            $result = $classifier->predict($new_data); //Melakukan prediksi terhadap data crawling an pada new_data

                                            $new_data = []; //Mengosongkan variabel new_data
                                            $arr_crawling[$ids]["classification"] = $result; //Menambahkan hasil prediksi naive bayes kedalam array arr_crawling bagian classification

                                            //Pembuatan tabel
                                            echo "<td class='text-center'>" . $result . "</td>";
                                            echo "</tr>";

                                            $ids++; //Update index
                                        }

                                        // Get max queue first
                                        $sql = "SELECT max(queue) AS 'max' FROM testing"; //Max queque agar data yang terambil adalah data yang barusan user klasifikasikan
                                        $res = $con->query($sql);
                                        $row = $res->fetch_assoc();

                                        $data = 0; //Variabel penampung untuk melihat berapa nilai dari queque terbesar

                                        if ($row['max'] == null) { //Apabila belum ada queque, maka mulai dari 1
                                            $data = 1;
                                        } else { //Apabila sudah ada queque maka queque sebelumnya ditambah 1
                                            $data = $row['max'] + 1;
                                        }

                                        // Insert data into database
                                        foreach ($arr_crawling as $key => $value) { //Melakukan loop terhadap setiap item pada arr_crawling
                                            $sql = "INSERT INTO testing (title, date, original_category, system_classification, queue) VALUES (?,?,?,?,?)"; //melakukan insert kedalam testing
                                            $stmt = $con->prepare($sql);
                                            $stmt->bind_param("ssssi", $value['title'], $value['date'], $value['category'], $value['classification'], $data);
                                            $stmt->execute();
                                        }
                                    } else { //Apabila user tidak menginputkan keyword
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
    // header("Access-Control-Allow-Origin: *");

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


</html>