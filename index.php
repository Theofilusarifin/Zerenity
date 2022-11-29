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
                            <li><a href="index.html" class="active">Home</a></li>
                            <li><a href="browse.html">Crawling</a></li>
                            <li><a href="details.html">Classification</a></li>
                            <li><a href="streams.html">Evaluation</a></li>
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
                                <form action="" id="crawl_form" method="POST">
                                    <div class="content">
                                        <div class="row mt-3 d-flex justify-content-center align-items-center no-gap ">
                                            <div class="col-8 mt-3">
                                                <div class="search-input">
                                                    <input type="text" placeholder="Type Something" name="keyword" id="keyword">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="main-border-button" style="margin: 0; padding:0;">
                                                    <a href="#" onclick="document.getElementById('crawl_form').submit()">Find</a>
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
                                <tbody>
                                    <?php
                                    // contoh linknya https://search.okezone.com//?q=coba
                                    // contoh linknya https://search.sindonews.com/go?type=artikel&q=mau

                                    use Phpml\Classification\NaiveBayes;
                                    use Phpml\FeatureExtraction\TokenCountVectorizer;
                                    use Phpml\Tokenization\WhitespaceTokenizer;
                                    use Phpml\FeatureExtraction\TfIdfTransformer;
                                    use Phpml\Math\Distance\Minkowski;

                                    //Kalau button search di klik dan isi keywordnya tidak kosong
                                    if (!empty($_POST['keyword'])) {
                                        include_once('simple_html_dom.php');
                                        require_once __DIR__ . '/vendor/autoload.php';

                                        
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