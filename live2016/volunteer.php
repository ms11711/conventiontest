<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $config_title; ?> | Voluteer</title>
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
                        <h4>Volunteer</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->


        <div class="divide60"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin30">
                    <h3 class="heading">Volunteering</h3>
                    <p>The 2016 YJA Convention would not be possible without the tireless work of our volunteers. The Adult Volunteer Committee is looking for dedicated individuals to help us host a successful convention. We need volunteers from around 8am on Friday, July 1st, to 2pm on Monday, July 4th. However, generally, volunteers will be working from around 6am to 3am during various shifts on the Saturday and Sunday (July 2nd/3rd) during convention.</p>
                    <p>Jobs include:</p>
                    <ul>
                        <li><strong>Security</strong>: Help manage crowd flows, baggage check, and traffic during registration; partner with external security team to ensure convention rules are followed (requires long periods of standing/sitting)</li>
                        <li><strong>Hospitality</strong>: Prepare, distribute and transport food, and assist with other food logistics</li>
                        <li><strong>Travel</strong>: Assist attendees and speakers with reaching the hotel from major airports (requires long periods of standing/sitting and providing transportation from airport to convention hotel)</li>
                        <li><strong>Decorations</strong>: Assist setting up decorations in hotel for social events (may require heavy lifting, standing on ladders, and/or reaching heights)</li>
                        <li><strong>Speaker Liason</strong>: Assist speakers with directions, providing items they may require, and/or assist them with sessions</li>
                        <li><strong>Assist Dignitaries</strong>: Accommodate dignitaries' needs and assist them throughout the convention</li>
                        <li><strong>Photography/Videography</strong>: Use your own equipment to record sessions and events as needed</li>
                        <li><strong>General Assistance</strong>: Provide help wherever necessary</li>
                    </ul>
                    <!--<p>If you are over the age of 35 and are interested in helping make this the best convention yet, please fill out this <a href="http://goo.gl/forms/F8dR6Fcf63"><strong>form</strong></a>, and we will get back to within a week to confirm your registration and begin the scheduling process.</p>-->
                    <p>If you have any questions or concerns, feel free to email <a href="mailto:volunteer.la@yja.org">volunteer.la@yja.org</a>.</p>
                    <p>Thank you for your interest and help in advance!</p>
                      
                </div>
              
            </div>
        </div>
        <div class="divide40"></div>
                  
        <?php include "config/footer.php" ?>

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
 
       
    </body>
</html>
