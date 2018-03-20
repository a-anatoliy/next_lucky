<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$meta_desc?>">
    <meta name="keywords" content="<?=$meta_key?>">
    <meta name="author" content="Yukai">
    <link rel="icon" href="favicon.ico">
    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Italianno:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link href="/css/blog.css" rel="stylesheet">
    <link href="/css/contact.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- link href="/css/cssco.css" rel="stylesheet" -->

    <script>window.jQuery || document.write('<script src="/js/jquery-1.9.1.min.js"><\/script>')</script>
</head>
<body>

<div class="container">

        <header class="blog-header py-3">
            <?=$header?>
        </header>

        <div class="row">
            <div class="col-12 justify-content-between">
                <?=$menu?>
            </div>
        </div>

    <!-- /.row -->

    <?=$carousel?>

</div>
<!-- /.container -->

<main role="main" class="container">
    <div class="row">
        <?=$content?>
    </div>
</main>


<footer class="blog-footer">
    <?=$footer?>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- script>window.jQuery || document.write('<script src="/js/jquery-slim.min.js"><\/script>')</script -->

<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
