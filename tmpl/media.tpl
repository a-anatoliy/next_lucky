<link rel="stylesheet" href="/css/gallery.css">
<link rel="stylesheet" href="/css/baguetteBox.css">
<script src="/js/baguetteBox.min.js" async></script>
<div class="col-12 blog-main">

    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link nav-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                       » <?=$miscTitle?>
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body"><div class="gallery5"><?=$misc?></div></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed nav-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        » <?=$g18Title?>
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body"><div class="gallery5"><?=$g18?></div></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed nav-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        » <?=$g17Title?>
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body"><div class="gallery5"><?=$g17?></div></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingOther">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed nav-link" data-toggle="collapse" data-target="#collapseOther" aria-expanded="false" aria-controls="collapseOther">
                        » <?=$otherTitle?>
                    </button>
                </h5>
            </div>
            <div id="collapseOther" class="collapse" aria-labelledby="headingOther" data-parent="#accordion">
                <div class="card-body"><div class="gallery5"><?=$other?></div></div>
            </div>
        </div>

    </div>
</div>
<span style="padding-top: 20px !important;">&nbsp; </span>
<script>
    window.onload = function() {
        baguetteBox.run('.gallery5', { animation: 'fadeIn', noScrollbars: true });
//        baguetteBox.run('.gallery6', { animation: 'fadeIn', noScrollbars: true });
//        baguetteBox.run('.gallery7', { animation: 'fadeIn', noScrollbars: true });
//        baguetteBox.run('.gallery8', { animation: 'fadeIn', noScrollbars: true });
    };
</script>