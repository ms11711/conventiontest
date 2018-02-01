<?php
//Initialisation
require_once 'includes/init.php';
 ?>
<?php include "config/config.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $config_title; ?> | Location</title>
        <meta name="description" <?php echo 'content="'.$config_description.'"'; ?> >
        <meta name="keywords" <?php echo 'content="'.$config_keywords.'"'; ?> >

        <?php echo $config_favicon; ?>

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- custom css (blue color by default) -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">

        <!-- font awesome for icons -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- flex slider css -->
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
        <!-- animated css  -->
        <link href="css/animate.css" rel="stylesheet" type="text/css" media="screen">


        <link href="css/YTPlayer.css" rel="stylesheet">


        <!--owl carousel css-->
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
        <!--mega menu -->
        <link href="css/yamm.css" rel="stylesheet" type="text/css">
        <!--popups css-->
        <link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

     <?php include "config/nav.php" ?>



        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Chicago, Illinois</h4>
                    </div>

                </div>
            </div>
        </div><!--breadcrumbs-->


        <div class="divide30"></div>


        <div class="container">
            <div class="row">
                <div class="col-md-8 margin30">
                  <h3 class="heading">Westin O'Hare</h3>

                    <img src="img/Westin.jpg" class="img-responsive" alt="">

        <div class="divide20"></div>




<!--
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="vid/Sheraton Gateway Los Angeles Hotel Photo Tour.mp4"></iframe>
                    </div>
-->
                    <div class="divide30"></div>

                </div>
                <div class="col-md-4">

                    <img src="img/five-stars.png" class="location-stars" alt="">
                    <p>
                       Stylish and sophisticated, this Chicago hotel is located blocks from the Chicago O'Hare Airport. The Westin O'Hare offers travelers a convenient shuttle service to and from the terminals, ensuring a seamless arrival and departure. Feel empowered to explore the greater Chicago area from our Rosemont hotel, which is located within walking distance of the Blue Line "EL" train, plus situated near prominent area attractions like Allstate Arena.
                    </p>

                </div>
            </div>

            <div class="row">





                <div class="col-sm-6">

                            <h3 class="heading">Contact Information</h3>

                            <ul class="list-unstyled contact contact-info">
                                <li><p><strong><i class="fa fa-map-marker"></i> Address:</strong> 6100 N River Rd, Rosemont, IL 60018<div>

                                  Phone: (847) 698-6000</p></li>
                            </ul>

                          <div id="map-canvas"></div>
                          <br>
                        </div>
                        <div>



                <div class="col-sm-6">
                    <h3 class="heading">Shuttle Service</h3>


                      Complimentary Shuttle Service
                    Effortlessly access Chicago O'Hare International Airport via our hotel's complimentary shuttle service.

                    For domestic flights, pick up is at the Hotel Shuttle Center Door #3, which is located just off the baggage claim area.
                    Between Midnight and 5:00am, please call 847-698-6000 to arrange service
                    Pickup at the International Terminal is available upon request. Please call the hotel directly upon arrival to arrange for pickup. Disabled accessible shuttles are available upon request.


                    </div>


                    </div>


                    </div>

                </div>


            </div>


        </div>
        <div class="divide40"></div>

            <?php include 'config/footer.php' ?>


       <!--scripts and plugins -->
        <!--must need plugin jquery-->
        <script src="js/jquery.min.js"></script>
        <!--bootstrap js plugin-->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!--easing plugin for smooth scroll-->
        <script src="js/jquery.easing.1.3.min.js" type="text/javascript"></script>
        <!--sticky header-->
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <!--flex slider plugin-->
        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
        <!--parallax background plugin-->
        <script src="js/jquery.stellar.min.js" type="text/javascript"></script>


        <!--digit countdown plugin-->
        <script src="js/waypoints.min.js"></script>
        <!--digit countdown plugin-->
        <script src="js/jquery.counterup.min.js" type="text/javascript"></script>
        <!--on scroll animation-->
        <script src="js/wow.min.js" type="text/javascript"></script>
        <!--owl carousel slider-->
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>
        <!--popup js-->
        <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <!--you tube player-->
        <script src="js/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>


        <!--customizable plugin edit according to your needs-->
        <script src="js/custom.js" type="text/javascript"></script>


        <!--cantact form script-->
        <script src="js/contact_me.js" type="text/javascript"></script>
        <script src="js/jqBootstrapValidation.js" type="text/javascript"></script>
        <!--gmap js-->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript">
            var myLatlng;
            var map;
            var marker;

            function initialize() {
                myLatlng = new google.maps.LatLng(33.946501, -118.3929517);

                var mapOptions = {
                    zoom: 13,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    draggable: false
                };
                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                var contentString = '<p style="line-height: 20px;"><strong>Sheraton Gateway LAX</strong></p><p></p>6101 W. Century Blvd.<p>Los Angeles, 90045</p>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: 'Marker'
                });

                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map, marker);
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <!--you tube player-->
        <script src="js/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>
    </body>
</html>
