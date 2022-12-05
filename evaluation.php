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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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

        .main {
            text-align: center;
            color: #3BBA9C;
            font-size: 20px;
        }

        #donutchart {
            width: 700px;
            height: 400px;
            margin-left: auto;
            margin-right: auto;
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
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="crawling.php">Crawling</a></li>
                            <li><a href="classification.php">Classification</a></li>
                            <li><a href="evaluation.php" class="active">Evaluation</a></li>
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
                                <h2 style="margin-top: 0;">Evaluation</h2>
                            </div>
                        </div>
                    </div>

                    <!-- ***** Table Result Start ***** -->
                    <div class="gaming-library">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Evaluation</em> Result</h4>
                            </div>
                            <table class="table table-borderless" style="color: white;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width:30%" class="text-center">Title</th>
                                        <th scope="col" style="width:25%" class="text-center">Original Category</th>
                                        <th scope="col" style="width:25%" class="text-center">System Classification</th>
                                        <th scope="col" style="width:20%" class="text-center">Result</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- ***** Table Result End ***** -->

                    <!-- ***** Table Result Start ***** -->
                    <div class="gaming-library">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Accuracy</em> Result</h4>
                            </div>
                            <div class="main">
                                <script type="text/javascript">
                                    google.charts.load("current", {
                                        packages: ["corechart"]
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Type', 'Percentage'],
                                            ['Correct Classification', <?php echo ((100 / 200) * 100); ?>],
                                            ['Wrong Classification', <?php echo (((300 - 100) / 300) * 100) ?>]
                                        ]);

                                        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                                        chart.draw(data);
                                    }
                                </script>

                                <div id="donutchart" style="margin-bottom: 2%"></div>
                            </div>
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