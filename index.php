<!doctype html>
<html lang="en">
<?php
session_start();
define ( 'ROOT_DIR', dirname ( __FILE__ ) );

include ROOT_DIR.'/data/SxGeo.php';
include ROOT_DIR.'/bin/menuBuilder.php';

$SxGeo = new SxGeo(ROOT_DIR.'/data/SxGeo.dat');
$countryCode = $SxGeo->getCountry($_SERVER['REMOTE_ADDR']);

$logFile  = ROOT_DIR."/data/hitcount.txt";
$cfg      = require ROOT_DIR.'/data/cfg/config.php';
$langPack = require ROOT_DIR.'/data/cfg/lang.php';

$lang = ($countryCode) ? strtolower($countryCode) : $cfg["site"]["defLang"];
$lang='en';
$langPack=$langPack[$lang];

$menu = new menuBuilder();

//require 'bin/hit_counter.php';
//$hit_obj = new BT_HitCounter();
//$hit_obj->unique_visits = true;
//$hit_obj->hit_count_file = $logFile;
//
//if(!isset($_SESSION["counted"])){
//    $hit_obj->recordHit();
//    $_SESSION["counted"]=1;
//}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Продукт - ориентированная на продукт продвигающая маркетинговая страница с обширной сеткой и изображениями.">
    <meta name="author" content="">
    <!--    <link rel="icon" href="favicon.ico">-->

    <title>Lucky DRESS | atelier</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
<!--    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Italianno:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link href="/css/blog.css" rel="stylesheet">

</head>
<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1"><div class="text-muted header_date"><?php echo date(" d F Y") ?></div></div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark blog-header-spacing" href="/">
                    <img src="/i/header-logo.png" alt="Lucky Dress">
                </a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="handwrited">Your day, Your style!</div>
            </div>
        </div>
    </header>

    <div class="row">
        <div class="col-12 justify-content-between">
            <?php $menu->buildMenu('about',$lang); ?>
        </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/i/_R7A1132.jpg" alt="Первый слайд">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/i/_R7A1202.jpg" alt="Второй слайд">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/i/_R7A1631.jpg" alt="Третий слайд">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/i/_R7A1549.jpg" alt="Третий слайд">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-12 blog-main"><div class="blog-post"><?php echo $langPack["intro"] ?></div></div>
    </div>
</main><!-- /.container -->

<footer class="blog-footer">
    <div>&copy; Yukai <span class="header_date"><?php echo date("Y") ?></span></div>
    <div><a href="#top">Back to top</a></div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="/js/jquery-slim.min.js"><\/script>')</script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>