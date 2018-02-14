<!doctype html>
<html lang="en">
<?php
session_start();
define ( 'ROOT_DIR', dirname ( __FILE__ ) );

include(ROOT_DIR.'/data/SxGeo.php');
$SxGeo = new SxGeo(ROOT_DIR.'/data/SxGeo.dat');
$countryCode = $SxGeo->getCountry($_SERVER['REMOTE_ADDR']); // возвращает двухзначный ISO-код страны

$logFile  = ROOT_DIR."/data/hitcount.txt";
$cfg      = require ROOT_DIR.'/data/cfg/config.php';
$langPack = require ROOT_DIR.'/data/cfg/lang.php';


$lang = ($countryCode) ? strtolower($countryCode) : $cfg["site"]["defLang"];
//$lang='pl';
$langPack=$langPack[$lang];

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

    <title>Продукт | Product example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">

</head>
<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <span class="text-muted date">05 Feb 2018</span>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="/">
<!--                    Lucky DRESS-->
                    <img src="/tmp/site-logo.png" alt="Lucky DRESS">
                </a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center date">
<!--                <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>-->
                <i>Your day, Your style!</i>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="#">HOME</a>
            <a class="p-2 text-muted" href="#">ABOUT</a>
            <a class="p-2 text-muted" href="#">CONTACT</a>
            <a class="p-2 text-muted" href="#">GALLERY</a>
            <a class="p-2 text-muted" href="#"></a>
            <a class="p-2 text-muted" href="#">PL</a>
            <a class="p-2 text-muted" href="#">EN</a>
            <a class="p-2 text-muted" href="#">RU</a>
        </nav>
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
        <div class="col-md-12 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">About</h2>
                <p>&nbsp;Każda suknia uszyta w Lucky Dress to <b>Szczęśliwa Sukienka</b>. Wierzymy, że dobrze dobrana sukienka daje każdej z nas wyjątkowe poczucia radości z przeżywania własnej kobiecości.</p>
                <div>&nbsp;Posiadamy bogate doświadczenie w projektowaniu i krawiectwie najwyższej klasy, dzięki czemu wiemy co uszyć i jak uszyć, aby wydobyć kobiece piękno z każdej sylwetki. Śledzimy najnowsze trendy modowe i nie są nam straszne żadne, nawet najbardziej wyrafinowane projekty.</div>
                <br><div>&nbsp;Przykładamy wielką uwagę do detali i wykończenia. Do tworzenia naszych sukni wykorzystujemy najlepsze włoskie tkaniny.</div>
                <br><div>&nbsp;To powiększającym się grono zadowolonych klientek, poparte wieloletnie doświadczeniem, stało się motywacją do stworzenia własnej marki i wyjątkowego salonu, do którego serdecznie Cię zapraszamy.</div>
                <br><div>&nbsp;W salonie «Lucky Dress – Szczęśliwa Sukienka» znajdziesz zarówno gotowe projekty sukni ślubnych, weselnych oraz wieczorowych jak i inspiracje do stworzenia własnego projektu, który z radością dla Ciebie uszyjemy. Każda kobieta jest wyjątkowa, dlatego oferujemy również możliwość szycia na miarę.</div>
                <br><div>&nbsp;Jeśli posiadasz niestandardową sylwetkę lub nie masz pomysłu w czym będziesz wyglądać pięknie – po prostu przyjdź, porozmawiamy i stworzymy wspólnie projekt Twoich marzeń. Czekamy na Ciebie.</div></p>
            </div><!-- /.blog-post -->

        </div>
    </div>
</main><!-- /.container -->

<footer class="blog-footer">
    <p>&copy; Yukai <span class="date">2018</span></p>
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