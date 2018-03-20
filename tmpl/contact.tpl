<!-- Contact Section -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="contact-header"><?=$contact?></h3>
                <div class="contact-header-small"><?=$arrange?></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8" id="form-div">
                <form role="form" id="contactForm" data-toggle="validator" class="animated shake">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend"><div class="input-group-text"><span class="fa fa-user"></div></div>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="<?=$name?>" required="" data-validation-required-message="Please enter your name." />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend"><div class="input-group-text"><span class="fa fa-envelope"></span></div></div>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="required" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend"><div class="input-group-text"><span class="fa fa-phone"></span></div></div>
                                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="<?=$phoneNumb?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" rows="6" cols="25" required="required" placeholder="<?=$message?>"></textarea>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <div class="clearfix">
                                <button type="submit" id="form-submit" class="btn btn-secondary contact-button float-left"> <?=$act?> </button>
                                &nbsp; <button type="reset" value="reset" accesskey="r" id="form-submit" class="btn btn-secondary contact-button"> reset </button>
                                <div id="msgSubmit" class="float-lg-right hidden"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <legend id="bordered"><span class="fa fa-globe"></span> Adress</legend>
                <address>
                    &nbsp; ul. Długa<span class="header_date"> 17, 31-147</span> <strong>Kraków</strong><br>
                    &nbsp; Pasaż Wenecki, «Szczęśliwa sukienka»<br>
                    &nbsp; <i class="fa fa-phone"></i> <abbr title="Phone number"> Phone:</abbr> <span class="header_date">(+48) 794 64 64 62</span>
                </address>
<!--                <address><span class="fa fa-envelope"></span> <a href="mailto:apanolga@gmail.com">info@lucky-dress.eu</a></address> -->
                <div><strong id="bordered">Godziny otwarcia</strong>
                    <br>&nbsp;pon. – pt. <span class="header_date">10:00 – 18:00</span>
                    <br>&nbsp;sob. <span class="header_date">10:00 – 14:00</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function initMap() {
            // var napiaski = {lat: 50.104911, lng:19.923992};
            var dluga = {lat:50.068248, lng:19.938644};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: dluga
            });
            var marker = new google.maps.Marker({
                position: dluga,
                // position: napiaski,
                // icon: {
                //     path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                //     scale: 10,
                // },
                animation: google.maps.Animation.DROP,
                title: "Lucky DRESS",
                map: map
            });
        }
        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDQKdquc3DvxXQU51TLOxn-9hv5hKoa64&callback=initMap&clickableIcons=false" async defer></script>

    <!-- Map Section -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div id="map"> </div>
            </div>
        </div>
    </div>


<!-- Plugin JavaScript -->
<script type="text/javascript" src="/js/validator.min.js"></script>
<script type="text/javascript" src="/js/form-scripts.js"></script>
