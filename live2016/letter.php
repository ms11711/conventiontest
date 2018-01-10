<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?>
<?php include "config/db_connect.php" ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $config_title; ?> | A Letter from the Co-Chairs</title>
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

        <style type="text/css">
        .popover {width: 275px;font-size:13px;}
        .popover-title {font-size:13px !important; padding: 0px 14px !important; text-transform: none !important;}
        .col-4-space .project-post {padding: 5px;}
        .fa-angellist, .fa-tree, .fa-heartbeat, .fa-briefcase, .fa-book {
            color:#ff8824;
        }
        .fa-angellist:hover, .fa-tree:hover, .fa-heartbeat:hover, .fa-briefcase:hover, .fa-book:hover {
            color:#000000;
        }
        </style>

    </head>
    <body>




       <?php include "config/nav.php" ?>


        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>A Letter from the Co-Chairs</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->


        <div class="divide30"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin30">
                    <p>July 16, 2016</p>
                    <p>Jai Jinendra,</p>
                    <p>In our final remarks, we would simply like to say thank you. While the four of us may have overseen the planning efforts, it was you who made the 2016 YJA Convention a huge success. You were the ones leading sessions, participating in JAB/JIA, sparking up important conversations, and inspiring each other to become Agents of Change. You have given and received insight on what it takes to make the world a place where all living souls can peacefully coexist.</p>
                    <p>Moving forward, we would like to emphasize that the convention experience is not over yet. As a matter of fact, this is just the beginning. While you now have more knowledge on using Jainism to impact society, that knowledge can only be worthwhile if you apply it. We urge you to take what you have learned and find ways to better your communities. Now more than ever, we need to step outside of our comfort zones and collaborate with people from all walks of life to create positive change.</p>
                    <p>As you take part in volunteering activities, start your own charities, or even perform random acts of kindness, we want you to realize that you will never be alone. If you ever need someone to share your thoughts or ideas with, please do not hesitate to reach out to us via social media or at <a href="mailto:info@yja.org">info@yja.org</a>. Furthermore, you are always encouraged to stay in touch with your fellow young Jains on our <a href="http://yjaforums.com">YJA Forums</a> webpage. This is a great platform to build upon the conversations you had during daytime sessions at our convention.</p>
                    <p>Finally, we would like to recognize the many people who helped us successfully celebrate our 25th Anniversary. We thank our Board and Subcommittee members for sacrificing so much to organize an amazing convention; our adult volunteers and donors for their selfless service to the Jain community; and the JAINA EC, YJA Board of Trustees, Jain Center of Southern California, and sanghs all over North America for empowering us youth to become Agents of Change.</p>
                    <p>As we end this letter, we sum up our entire convention experience with just one word: agape!</p>
                    <p>With #yjalove,</p>
                    <p>
                        <strong>Puja Savla, Akash Shah, Amit Shah, and Sunny Dharod</strong><br>
                        2016 YJA Convention Committee Co-Chairs<br>
                        <a href="mailto:chairs.la@yja.org">chairs.la@yja.org</a>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 margin30">
                    <p>If you would like to download the letter, please <a href="assets/Co-ChairLetter.pdf">click here</a>.</p>
                </div>
            </div>
        </div>
                  
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
        
        <script src="js/jquery.isotope.min.js" type="text/javascript"></script>
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
        <!--image loads plugin -->
        <script src="js/jquery.imagesloaded.min.js" type="text/javascript"></script>


        <!--customizable plugin edit according to your needs-->
        <script src="js/custom.js" type="text/javascript"></script>
        <script src="js/isotope-custom.js" type="text/javascript"></script>

        <script>
            $('#myCarousel').carousel({
                interval: 3000
            }); 
        </script>
    </body>
</html>
