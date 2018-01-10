<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?><?php include "config/db_connect.php" ?>

<?php


$SQL = "SELECT * FROM Sessions WHERE jnfcap > '0'";
            $result = mysql_query($SQL);

            $sessions = array();
          
            while ($row = mysql_fetch_object($result)) {
                array_push($sessions, $row); 
            }

            function cmp($a, $b)
            {
                return strcmp($a->title, $b->title);
            }

            usort($sessions, "cmp");


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $config_title; ?> | Jain Networking Forum</title>
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
                        <h4>Jain Networking Forum</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->    

        <div class="divide60"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin30">
                    <h3 class="heading">Jain Networking Forum 2016</h3>
                    <p>
                    Jain Networking Forum (JNF) is designed for Jains between the ages of 21-29 and has the goal of fostering professional and social relationships. It provides attendees the opportunity to meet similar minded individuals through interactive daytime sessions, while creating lasting connections with Jains that are successful in a variety of careers. Additionally, our unique social events will allow attendees to relax, mingle, and have an unforgettable experience this July at YJA 2016. If you have any questions, feel free to reach out to us at <a href="mailto:jnf.la@yja.org">jnf.la@yja.org</a>. We’re excited to see you in sunny Los Angeles this July!
                    </p>                      
                </div>
                <div class="col-md-6 margin30">
                    <h3 class="heading">DAYTIME</h3>
                    <h4>Community Service Project</h4>
                    <p>Join us for a JNF wide community service project where we will work with TCCOP (Tender Care Community Outreach Program), a Southern California based organization that provides monthly meals to the homeless, visits the elderly in hospitals, and provides school supplies to students. Mingle with your fellow attendees while giving back to the local Southern California community as model Agents of Change!</p>
                </div>  
                <div class="col-md-6 margin30">
                    <img src="/images/CommServ.jpg" width="560">                     
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="heading">Daytime Sessions</h3>
                    <p>Below are the exciting JNF sessions we have planned – hover over the icons to see more!</p>
                </div>
            </div>

            <ul class="filter list-inline">
                <li><a class="active" href="#" data-filter="*">Show All</a></li>
                <li><a href="#" data-filter=".Interfaith"><i class="fa fa-angellist" style="color:#bbbbbb"></i> Interfaith</a></li>
                <li><a href="#" data-filter=".SocialImpact"><i class="fa fa-tree" style="color:#bbbbbb"></i> Social Impact</a></li>
                <li><a href="#" data-filter=".Lifestyle"><i class="fa fa-heartbeat" style="color:#bbbbbb"></i> Wellness & Lifestyle</a></li>
                <li><a href="#" data-filter=".Career"><i class="fa fa-briefcase" style="color:#bbbbbb"></i> Career</a></li>
                <li><a href="#" data-filter=".Education"><i class="fa fa-book" style="color:#bbbbbb"></i> Education</a></li>
            </ul>

            <div class="center-heading">
                <h2>Saturday</h2>
                <div class="center-line"></div>
            </div>

            <div class="row">
                <div class="portfolio-box iso-call col-4-space">

                <?php   

                for($i=0;$i<sizeof($sessions);$i++) {

                    $arr = explode(",", $sessions[$i]->time);
                    $day = $arr[0];

                    switch ($sessions[$i]->category) {
                        case "Interfaith":
                            $icon = '<i class="fa fa-angellist" aria-hidden="true" data-toggle="popover" data-placement="bottom" data-original-title="'.$sessions[$i]->speakers.'" data-content="'.$sessions[$i]->description.'"></i>';
                            break;
                        case "Social Impact":
                            $icon = '<i class="fa fa-tree" aria-hidden="true" data-toggle="popover" data-placement="bottom" data-original-title="'.$sessions[$i]->speakers.'" data-content="'.$sessions[$i]->description.'"></i>';
                            break;
                        case "Lifestyle":
                            $icon = '<i class="fa fa-heartbeat" aria-hidden="true" data-toggle="popover" data-placement="bottom" data-original-title="'.$sessions[$i]->speakers.'" data-content="'.$sessions[$i]->description.'"></i>';                            
                            break;
                        case "Career":
                            $icon = '<i class="fa fa-briefcase" aria-hidden="true" data-toggle="popover" data-placement="bottom" data-original-title="'.$sessions[$i]->speakers.'" data-content="'.$sessions[$i]->description.'"></i>';
                            break;
                        case "Education":
                            $icon = '<i class="fa fa-book" aria-hidden="true" data-toggle="popover" data-placement="bottom" data-original-title="'.$sessions[$i]->speakers.'" data-content="'.$sessions[$i]->description.'"></i>';
                            break;
                        default:
                    }

                    if($day == "Saturday") { 
                        $category = str_replace(' ', '', $sessions[$i]->category);
                        if (($sessions[$i]->title) != ($sessions[$i-1]->title)) {
                            echo '
                            <div class="project-post '.$category.'"> 
                                <div class="work-desc">
                                    <h5 align="center">'.$sessions[$i]->title.' '.$icon.'<br><span>'.$sessions[$i]->agegroup.'</span></h5>
                                </div><!--work desc-->
                            </div><!--project post-->';
                        }
                    }
                }

                ?>  

                </div>
            </div>


            <div class="center-heading">
                <h2>Sunday</h2>
                <div class="center-line"></div>
            </div>


            <div class="row">
                <div class="portfolio-box iso-call col-4-space">

               <?php   

                for($i=0;$i<sizeof($sessions);$i++) {

                    $arr = explode(",", $sessions[$i]->time);
                    $day = $arr[0];

                    switch ($sessions[$i]->category) {
                        case "Interfaith":
                            $icon = '<i class="fa fa-angellist" aria-hidden="true" data-toggle="popover" data-placement="bottom" data-original-title="'.$sessions[$i]->speakers.'" data-content="'.$sessions[$i]->description.'"></i>';
                            break;
                        case "Social Impact":
                            $icon = '<i class="fa fa-tree" aria-hidden="true" data-toggle="popover" data-placement="bottom" data-original-title="'.$sessions[$i]->speakers.'" data-content="'.$sessions[$i]->description.'"></i>';
                            break;
                        case "Lifestyle":
                            $icon = '<i class="fa fa-heartbeat" aria-hidden="true" data-toggle="popover" data-placement="bottom" data-original-title="'.$sessions[$i]->speakers.'" data-content="'.$sessions[$i]->description.'"></i>';                            
                            break;
                        case "Career":
                            $icon = '<i class="fa fa-briefcase" aria-hidden="true" data-toggle="popover" data-placement="bottom" data-original-title="'.$sessions[$i]->speakers.'" data-content="'.$sessions[$i]->description.'"></i>';
                            break;
                        case "Education":
                            $icon = '<i class="fa fa-book" aria-hidden="true" data-toggle="popover" data-placement="bottom" data-original-title="'.$sessions[$i]->speakers.'" data-content="'.$sessions[$i]->description.'"></i>';
                            break;
                        default:
                    }

                    if($day == "Sunday") {
                        $category = str_replace(' ', '', $sessions[$i]->category);
                        if (($sessions[$i]->title) != ($sessions[$i-1]->title)) {
                            echo '
                            <div class="project-post '.$category.'"> 
                                <div class="work-desc">
                                    <h5 align="center">'.$sessions[$i]->title.' '.$icon.'<br><span>'.$sessions[$i]->agegroup.'</span></h5>
                                </div><!--work desc-->
                            </div><!--project post-->';
                        }
                    }
                }

                ?>   

                </div>
            </div>

            <div class="divide30"></div>

            <ul class="filter list-inline">
                <li><a class="active" href="#" data-filter="*">Show All</a></li>
                <li><a href="#" data-filter=".Interfaith"><i class="fa fa-angellist" style="color:#bbbbbb"></i> Interfaith</a></li>
                <li><a href="#" data-filter=".SocialImpact"><i class="fa fa-tree" style="color:#bbbbbb"></i> Social Impact</a></li>
                <li><a href="#" data-filter=".Lifestyle"><i class="fa fa-heartbeat" style="color:#bbbbbb"></i> Wellness & Lifestyle</a></li>
                <li><a href="#" data-filter=".Career"><i class="fa fa-briefcase" style="color:#bbbbbb"></i> Career</a></li>
                <li><a href="#" data-filter=".Education"><i class="fa fa-book" style="color:#bbbbbb"></i> Education</a></li>
            </ul>

            <div class="row">
                <div class="col-md-12 margin30">
                    <p align="center"><em>Please note that daytime programming sessions are subject to change.</em></p>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <h3 class="heading">NIGHTTIME</h3>
                </div>
                <div class="col-md-4">
                    <img src="/images/AGS2.jpg" width="365" style="margin-bottom:15px;">
                    <h4 style="text-align:center;">Post-Mela: Agents of Shield</h4>
                    <p style="text-align:center;">You’ll have <a href="social">Met Every Last Agent (MELA)</a>, and now you can begin to develop those friendships further. Bring out your inner superhero, while mingling with other JNF attendees in this Post-Mela mixer!</p>                      
                </div>
                <div class="col-md-4">
                    <img src="/images/PCP.jpg" width="365" height="230" style="margin-bottom:15px;"> 
                    <h4 style="text-align:center;">Post-Garba: Pacific Coast Party</h4>
                    <p style="text-align:center;">Learn to love the West Coast while mingling with other JNF attendees and making your way through California themed activities after dancing the night away at <a href="social">Straight Outta Gujarat</a>.</p>
                </div>
                <div class="col-md-4">   
                    <img src="/images/FormalDinner.jpg" width="365" height="230" style="margin-bottom:15px;">   
                    <h4 style="text-align:center;">Formal Dinner: An Evening with the Stars</h4>
                    <p style="text-align:center;">Join us for an exclusive formal dinner just for JNF attendees. Spend the evening dining under the stars before being transported to <a href="social">Maharaja’s Court</a>. We highly encourage you to come dressed in Indian reception attire! Ladies have the option of wearing Indian clothes (i.e. sari, lehnga choli, salwar kameez/anarkali) or long American gowns; men may also don their Indian clothes (i.e. sherwani, kurta pajama) or black tie attire (i.e. suit and tie/bow tie). Get ready for a simple, yet elegant evening. </p>
                </div>
                <div class="col-md-12 margin30">
                    <p style="text-align:center;"><em>Please note that JNF events are subject to change.</em></p>
                </div>
            </div>


            <div class="row"> 
                <div class="col-md-12">
                    <h3 class="heading">JNF Team</h3>
                </div>
            </div>



            <div class="row">
                <div class="col-md-3" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-md-12" id="carousel-bounding-box">
                            <div id="myCarousel" class="carousel slide">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item" data-slide-number="0">
                                        <img alt="Anish Doshi" class="img-responsive" src="/assets/NeelamSavla.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="1">
                                    <img alt="Anjali Doshi" class="img-responsive" src="/assets/ShrenikShah.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="2">
                                    <img alt="Foram Shah" class="img-responsive" src="/assets/AnandShah.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="3">
                                    <img alt="Foram Shah" class="img-responsive" src="/assets/BonitaParikh.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="4">
                                    <img alt="Salil Ojha" class="img-responsive" src="/assets/KarishmaShah.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="5">
                                    <img alt="Siddharth Shah" class="img-responsive" src="/assets/NiketJain.jpg" />
                                    </div> 
                                    <div class="item" data-slide-number="6">
                                    <img alt="Siddharth Shah" class="img-responsive" src="/assets/RishabhParekh.jpg" />
                                    </div> 
                                    <div class="item" data-slide-number="7">
                                    <img alt="Siddharth Shah" class="img-responsive" src="/assets/SnehaParikh.jpg" />
                                    </div> 
                                    <div class="item" data-slide-number="8">
                                    <img alt="Siddharth Shah" class="img-responsive" src="/assets/AkashShah.jpg" />
                                    </div> 
                                    <div class="item" data-slide-number="9">
                                    <img alt="Siddharth Shah" class="img-responsive" src="/assets/AmitShah.jpg" />
                                    </div>
                                </div><!--/carousel-inner-->
                            </div><!--/carousel-->
                            <ul class="carousel-controls-mini list-inline text-center">
                              <li><a href="#myCarousel" data-slide="prev">‹</a></li>
                              <li><a href="#myCarousel" data-slide="next">›</a></li>
                            </ul><!--/carousel-controls-->
                      </div><!--/col-->     
                    </div><!--/row-->
                </div><!--/col-->

                <div class="col-md-9">
                    <p>Your 2016 JNF Team consists of Neelam Savla (CA) and Shrenik Shah (CA).</p>
                    <p>Working with them are Anand Shah (CA), Bonita Parikh (TX), Karishma Shah (CA), Niket Jain (NY), Rishabh Parekh (CA), Sneha Parikh (CT), and your convention Co-Chairs Akash Shah (CA) and Amit Shah (IL).</p>
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
