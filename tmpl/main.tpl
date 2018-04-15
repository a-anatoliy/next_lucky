<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="x-ua-compatible" content="IE=edge,chrome=1" http_equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="msapplication-tap-highlight" content="no">
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

    <!-- ANN Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
                {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '543861295961754');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=543861295961754&ev=PageView&noscript=1"
        /></noscript>
    <!-- ANN End Facebook Pixel Code -->


</head>
<body>

    <!-- fb init start -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=453526095028535';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <!-- fb init stop -->

<div class="container">
<!-- header -->
        <header class="blog-header py-3">
            <?=$header?>
        </header>

<!-- navigation -->
        <div class="row">
            <?=$menu?>
        </div>
<!-- /.row -->

    <?=$carousel?>

</div>
<!-- /.container -->

<!-- main content -->
<main role="main" class="container">
    <div class="row">
        <?=$content?>
    </div>
</main>

<!-- footer -->
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
