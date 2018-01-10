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
                        <h4>Los Angeles</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->

       
        <div class="divide60"></div>

 
        <div class="container">
            <div class="row">
                <div class="col-md-8 margin30">
                    <h3 class="heading">Sheraton Gateway LAX</h3>

                    <img src="img/sheraton.jpg" class="img-responsive" alt="">

        <div class="divide20"></div>

                    <p>
                       Stylish and sophisticated, this Los Angeles Airport hotel offers a distinctive blend of classic West Coast luxury and resort-style amenities. Located blocks from the Los Angeles Airport and offering a complimentary airport shuttle, the Sheraton Gateway Los Angeles Hotel is the ideal Los Angeles hotel for any type of traveler. Enjoy convenient access to nearby Los Angeles attractions, beaches, shopping, dining and more.
                    </p>


<!--
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="vid/Sheraton Gateway Los Angeles Hotel Photo Tour.mp4"></iframe>
                    </div>  
-->
                    <div class="divide30"></div>
            
                </div>
                <div class="col-md-4">
                    <h3 class="heading">Contact info</h3>
                    <ul class="list-unstyled contact contact-info">
                        <li><p><strong><i class="fa fa-map-marker"></i> Address:</strong> 6101 W. Century Blvd., Los Angeles, California 90045</p></li> 
                     

                    </ul> 
                    
            <div id="map-canvas"></div> 


                </div>
            </div>

            <div class="row"> 

                    <h3 class="heading">Local Attractions</h3> 
                <div class="col-sm-6">
                    <h3 class="heading">Free Attractions</h3>
                    <div class="results-box">
                        <h3><a href="http://www.getty.edu/visit/villa/" target="_blank">Getty Villa</a></h3>                       
                        <p>
                             The Getty Villa in the Pacific Palisades neighborhood of Los Angeles, California, USA (though its self-claimed location is in the city of Malibu, California[2]), is one of two locations of the J. Paul Getty Museum. The Getty Villa is an educational center and museum dedicated to the study of the arts and cultures of ancient Greece, Rome, and Etruria. The collection has 44,000 Greek, Roman, and Etruscan antiquities dating from 6,500 BC to 400 AD, including the Lansdowne Heracles and the Victorious Youth. 
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://griffithobservatory.org/" target="_blank">Griffith Observatory</a></h3>        
                                     
                        <p>
                           Southern California’s gateway to the cosmos! Visitors can look through telescopes, explore exhibits, see live shows in the Samuel Oschin Planetarium, and enjoy spectacular views of Los Angeles and the Hollywood Sign. 
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://jaincenter.org/hours-location.php" target="_blank">Jain Center of Southern California</a></h3>                        
                        <p>
                            Jain Center of Southern California (JCSC) was among the earliest Jain Centers in America. It was founded on September 15, 1979.[1][2] JCSC played a major role in founding of JAINA, the umbrella Jain body of North America by hosting the first Jain convention in 1981.
                        </p>
                    </div><!--result box-->
                    
                    <hr>
                    <div class="results-box">
                        <h3><a href="https://www.google.com/maps/dir/%27%27/hollywood+sign/@34.1340952,-118.3915883,12z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x80c2bf0a45505a7d:0xabb7acc626709843!2m2!1d-118.3215482!2d34.1341151" target="_blank">Hollywood Sign</a></h3>        
                                     
                        <p>
                           The Hollywood Sign (formerly the Hollywoodland Sign) is a landmark and American cultural icon located in Los Angeles, California. It is situated on Mount Lee, in the Hollywood Hills area of the Santa Monica Mountains. The sign overlooks Hollywood, Los Angeles.
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="https://www.google.com/maps/dir/%27%27/hollywood+walk+of+fame/@34.1012651,-118.4122179,12z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x80c2bf23ebb4ea07:0x231d79794d3e2203!2m2!1d-118.3421778!2d34.101285" target="_blank">Hollywood Walk of Fame</a></h3>                        
                        <p>
                            The Hollywood Walk of Fame comprises more than 2,500 five-pointed terrazzo and brass stars embedded in the sidewalks along 15 blocks of Hollywood Boulevard and three blocks of Vine Street in Hollywood, California. 
                        </p>
                    </div><!--result box-->
                    <hr>
              
                    <div class="results-box">
                        <h3><a href="https://www.google.com/maps/dir/%27%27/hollywood+sign/@34.1340952,-118.3915883,12z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x80c2bf0a45505a7d:0xabb7acc626709843!2m2!1d-118.3215482!2d34.1341151" target="_blank">Walt Disney Concert Hall</a></h3>        
                                     
                        <p>
                           The Walt Disney Concert Hall at 111 South Grand Avenue in Downtown of Los Angeles, California, is the fourth hall of the Los Angeles Music Center and was designed by Frank Gehry. It opened on October 24, 2003. Bounded by Hope Street, Grand Avenue, and 1st and 2nd Streets, it seats 2,265 people and serves, among other purposes, as the home of the Los Angeles Philharmonic orchestra and the Los Angeles Master Chorale. The hall is in a vineyard seating configuration, similar to the Berliner Philharmonie by Hans Scharoun.
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://venicecanalsassociation.org/" target="_blank">Venice Canals</a></h3>                        
                        <p>
                            The Venice Canal Historic District is a district in the Venice section of Los Angeles, California. The district is noteworthy for its man-made canals built in 1905 by developer Abbot Kinney as part of his Venice of America plan. Kinney sought to recreate the appearance and feel of Venice, Italy, in Southern California.
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://www.pacpark.com/" target="_blank">Santa Monica Pier</a></h3>                       
                        <p>
                             The pier contains Pacific Park, a family amusement park with its one-of-a-kind, state-of-the-art, solar paneled Ferris wheel. (This should not be confused with Pacific Ocean Park, a former amusement park a few miles south of Santa Monica Pier, which operated from 1958 to 1967 and is now demolished.)
                        </p>
                    </div><!--result box-->     
                    <hr>               
                    <div class="results-box">
                        <h3><a href="http://www.automobiledrivingmuseum.org/">Autmobile Driving Museum</a></h3>        
                                     
                        <p>
                           The ADM is the only automobile museum in the world that takes our guests for rides in our fleet. Every Sunday ( weather permitting ) the ADM features three different cars in our ride program. Guests can expect to ride in anything from Joseph Stalin’s 1936 Packard to a 1982 DeLorean.
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://flightpathmuseum.com/" target="_blank">LAX Imperial Terminal Museum</a></h3>                        
                        <p>
                            Unique among the fine aviation museums in Southern California is the Flight Path Learning Center, the only aviation museum and research center situated at a major airport and the only facility with a primary emphasis on contributions of civil aviation to the history and development of Southern California.
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://www.tclchinesetheatres.com/" target="_blank">Chinese Theatre</a></h3>                       
                        <p>
                             The TCL Chinese Theatre is the most iconic movie palace in the world. With over 50 events a year, including movie premieres, imprint ceremonies, and film festivals, the theatre continues to make Hollywood history every day.
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://www.olvera-street.com/" target="_blank">Olvera Street</a></h3>        
                                     
                        <p>
                           Olvera Street, known as “the birthplace of Los Angeles,” is a Mexican Marketplace that recreates a romantic “Old Los Angeles” with a block-long narrow, tree-shaded, brick-lined market with old structures, painted stalls, street vendors, cafes, restaurants and gift shops.  Olvera Street was created in 1930 “to preserve and present the customs and trades of early California."  Many of the merchants on Olvera Street today are descended from the original vendors. 
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://www.visitlittletokyo.com/" target="_blank">Little Tokyo</a></h3>                        
                        <p>
                            Charming, walkable and friendly, Little Tokyo is setting a new, more relaxing pace and invites everyone to experience its charm sometime soon. Visitors will find dozens of delectable food options, great bars, live performances, world-class museums, and shopping that is not only eclectic but also affordable. It is no wonder that new residents are moving into the area every day, and visitors in increasing numbers are discovering Little Tokyo's many hidden gems.
                        </p>
                    </div><!--result box--> 
                                                                            
                </div>


                <div class="col-sm-6">
                    <h3 class="heading">Paid Attractions</h3>
                     
                    <div class="results-box">
                        <h3><a href="https://www2.madametussauds.com/hollywood/en/" target="_blank">Madame Tussauds</a></h3>        
                                     
                        <p>
                           Millions and millions of people have flocked through the doors of Madame Tussauds since they first opened over 200 years ago and it remains just as popular as it ever was. There are many reasons for this enduring success, but at the heart of it all is good, old-fashioned curiosity.
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://www.starlinetours.com/los-angeles-tour-1.asp" target="_blank">Celebrity Home Tours</a></h3>                        
                        <p>
                            Join Hollywood’s #1 Celebrity Tour – the “Original Movie Stars’ Homes Tour” - as our fun, expert guides take you on the most comprehensive narrated tour of the celebrity mansions in Beverly Hills & the Hollywood Hills, the celebrity hotspots on Sunset Strip & Rodeo Drive and Hollywood’s iconic landmarks. Only with Starline’s customized 13-passenger buses can you visit the exclusive residential neighborhoods where other tour buses are forbidden to go! Bring your cameras, You may see a Star! 
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="https://disneyland.disney.go.com/" target="_blank">Disneyland</a></h3>                       
                        <p>
                             Walt Disney came up with the concept of Disneyland after visiting various amusement parks with his daughters in the 1930s and 1940s. He initially envisioned building a tourist attraction adjacent to his studios in Burbank to entertain fans who wished to visit; however, he soon realized that the proposed site was too small. After hiring a consultant to help him determine an appropriate site for his project, Walt bought a 160-acre (65 ha) site near Anaheim in 1953. Construction began in 1954 and the park was unveiled during a special televised press event on the ABC Television Network on July 17, 1955.
                        </p>
                    </div><!--result box-->   
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://www.universalstudioshollywood.com/" target="_blank">Universal Studios Hollywood</a></h3>        
                                     
                        <p>
                           Universal Studios Hollywood SM, The Entertainment Capital of L.A.SM, includes a full-day, movie-based theme park and Studio Tour plus Universal CityWalk®, our entertainment, shopping and dining complex, which includes the AMC Universal CityWalk Cinemas and the “5 Towers” state-of-the-art outdoor concert venue.
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://www.sonypicturesstudiostours.com/" target="_blank">Sony Pictures Studios</a></h3>                        
                        <p>
                            This 2-hour guided walking tour will give visitors a behind-the-scenes look of a working studio, where movie magic has been made for almost a century. 
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="https://www.latourist.com/index.php?page=the-grove" target="_blank">Grove Shopping District</a></h3>                       
                        <p>
                             In contrast to the quaint charm of the Original Farmers Market, The Grove is a modern take on the mega-mall, complete with many of the typical upper-end mall stores, along with boutique shops and restaurants. Its sprawling 575,000-square-foot space mixes Art Deco-style architecture with the flash of Las Vegas and a street layout akin to Main Street USA.
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://www.gondolasdamore.com/" target="_blank">Gondola Ride</a></h3>        
                                     
                        <p>
                           Your gondolier will take you on a slow excursion around Marina del Rey - the largest marina in the world. Available day or night, you will glide silently past Fisherman's Village and its restaurants. You will see pelicans and seals hanging around the live bait tanks. You will marvel at the mega yachts of the stars.
                        </p>
                    </div><!--result box-->
                    <hr>
                    <div class="results-box">
                        <h3><a href="http://www.aquariumofpacific.org/" target="_blank">Aquarium of the Pacific</a></h3>                        
                        <p> 
                            The Aquarium of the Pacific is the fourth most-attended aquarium in the nation. It displays over 11,000 animals in more than 50 exhibits that represent the diversity of the Pacific Ocean. Each year more than 1.5 million people visit the Aquarium. Beyond its world-class animal exhibits, the Aquarium offers educational programs for people of all ages from hands-on activities to lectures by leading scientists. Through these programs and a variety of multimedia experiences, the Aquarium provides opportunities to delve deeper into ocean science and learn more about our planet. The Aquarium of the Pacific has redefined the modern aquarium. It is a community gathering place where diverse cultures and the arts are celebrated and a place where important topics facing our planet and our ocean are explored by scientists, policymakers and stakeholders in the search for sustainable solutions.
                        </p>
                    </div><!--result box-->
                    
                                                                            
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
