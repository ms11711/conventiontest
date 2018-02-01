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
       
        <title><?php echo $config_title; ?> | Transportation</title>
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
                        <h4>Transportation</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->

       
        <div class="divide60"></div>

 
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin30">
                    <h3 class="heading">LAX to Sheraton Gateway - Shuttle Service</h3>
                    <p>The Sheraton Gateway Los Angeles provides a free, round-trip shuttle to LAX. Our shuttle runs continuously, stopping by the airport and the hotel every 10-15 minutes, 24 hours a day.  The shuttle stops are located outside baggage claim at every terminal, underneath the red overhead sign that says <strong>"Hotel and Courtesy Shuttle"</strong>.  The LAX shuttle is red and yellow with the <strong>Sheraton Gateway name and logo</strong>.</p>            
                    <p>If you would like additional information, please visit the Sherton Gateway's <a href="http://www.sheratonlax.com/shuttle-to-lax">website</a>.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 margin30">
                    <h3 class="heading">Travel Discounts</h3>
                    <p>Please use the following airline discount codes when booking your travel to LAX (Los Angeles Intl Airport). Enter the discount code when searching for your flight.</o>
                    <table class="table table-hover" id="discountcodes-table">
                        <tr>
                          <th>Carrier</th>
                          <th>Discount Rate</th>
                          <th>Discount Code</th>
                          <th>Travel Dates</th>
                          <th>Destination</th>
                          <th>
                        </tr>
                        <tr>
                          <td>United</td>
                          <td>2% - 10%</td>
                          <td>ZWGM985153</td>
                          <td>6/28 - 7/7</td>
                          <td>LAX</td>
                        </tr>
                        <tr>
                          <td>Delta</td>
                          <td>2% - 10%</td>
                          <td>NMN9P (Meeting Code)</td>
                          <td>6/28 - 7/7</td>
                          <td>LAX</td>
                        </tr>
                    </table>
                </div>   
            </div>
            
            <div class="row"> 
                <div class="col-md-12">
                    <h3 class="heading">Transport from Closest Metro Stations to Convention Center</h3> 
                    <p>The best means of transportation from the stations to the Sheraton Gateway is by cab or UBER/Lyft service. </p>
                </div>
                <div class="col-md-4 margin30">
                    <p>Aviation/LAX Station</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d13240.450904638037!2d-118.39537526593533!3d33.93822869019187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x80c2b6b8e1c322e9%3A0x883b0db26d772783!2sAviation+%2F+LAX+Station%2C+Los+Angeles%2C+CA!3m2!1d33.9296305!2d-118.3772528!4m5!1s0x80c2b6d4e2d10a59%3A0x8fc3dc08704b5f1d!2sSheraton+Gateway+Los+Angeles+Hotel%2C+West+Century+Boulevard%2C+Los+Angeles%2C+CA!3m2!1d33.946501!2d-118.39076299999999!5e0!3m2!1sen!2sus!4v1454730422666" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-4 margin30">
                    <p>El Segundo Station</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d26482.64829709442!2d-118.40721385331149!3d33.932612910856164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x80c2b6ae9a33a637%3A0xa8ef04ebb2a3ace2!2sEl+Segundo+Station!3m2!1d33.916063!2d-118.386539!4m5!1s0x80c2b6d4e2d10a59%3A0x8fc3dc08704b5f1d!2sSheraton+Gateway+Los+Angeles+Hotel%2C+6101+West+Century+Boulevard%2C+Los+Angeles%2C+CA+90045!3m2!1d33.946501!2d-118.39076299999999!5e0!3m2!1sen!2sus!4v1454730439562" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-4 margin30">
                    <p>Hawthorne/Lennox Station</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d26481.035213807656!2d-118.38869150330274!3d33.937799760764925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x80c2b68bfdf43293%3A0x9d72d0c26c693567!2sHawthorne+%2F+Lennox+Station!3m2!1d33.933442!2d-118.3517086!4m5!1s0x80c2b6d4e2d10a59%3A0x8fc3dc08704b5f1d!2sSheraton+Gateway+Los+Angeles+Hotel%2C+West+Century+Boulevard%2C+Los+Angeles%2C+CA!3m2!1d33.946501!2d-118.39076299999999!5e0!3m2!1sen!2sus!4v1454730474207" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="divide20"></div>

            
            <div class="row"> 
                <div class="col-md-12 margin30">
                    <h3 class="heading">Tips for Finding the Cheapest Flight</h3> 
                    <ol>
                        <li><u>Only book flights to LAX.</u> No transportation will be provided from any other airport. A shuttle will run between LAX and the hotel every 15 minutes, and the hotel is only one mile away if you choose to use Uber or take a cab.</li>
                        <li>Keep in mind that YJA will not provide overnight accommodations until the first day of convention (Friday, July 1st).</li>
                        <li>Travel in a group! Talk to a travel agent about having members of your sangh travel back and forth together. It makes the travel much more fun, and you may be able to receive a group discount from the airline!</li>
                        <li>Book 6 weeks in advance. Statistically, 47 days is the golden number to book in advance.</li>
                        <li>Booking your flight on Tuesdays at 3 p.m. has been shown to result in the lowest price for the airfare.</li>
                        <li>Search for flights on Chrome using “InCognito mode” (or inPrivate Mode for Internet Explorer). This prevents your search history from affecting the price of flights you find.</li>
                        <li>Using a website like Yapta.com will allow you to be alerted if your flight’s price falls.</li>
                        <li>Prices fluctuate! Call the airline the next day after booking to see if you can rebook without a penalty if your flight price fell.</li>
                        <li>Fly two different airlines. Some airlines sell one-way flights at reasonable prices, so one airline might work better for the outbound flight while the other works better for the return.</li>
                        <li>If you are planning on coming to LA early to see family or sightsee, come in on Wednesday. Typically, flights that fly on Wednesdays are cheaper than any other day of the week.</li>
                        <li>Search for flight rates on multiple sites (Expedia, Travelocity, and Orbitz) for the best deal.</li>
                        <li>Too busy to search for the best deals? Let AirfareWatchdog.com alert you to keep you updated with the cheapest flights!</li>
                        <li>Avoid penalty fees by indicating online that you intend to check-in bags. Know your airline’s policy on fees for carry-on bags, seat assignments, printing a boarding pass.</li>
                    </ol>                                                       
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
