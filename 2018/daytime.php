<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?>
<?php include "config/db_connect.php" ?>

<?php


$SQL = "SELECT * FROM Sessions WHERE hscap > '0' || ccap > '0'";
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

        <title><?php echo $config_title; ?> | Daytime Programming</title>
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
                        <h4>Daytime Programming</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->


        <div class="divide60"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 margin30">
                    <p>Welcome to Daytime Programming at the 2016 Young Jains of America (YJA) Convention! This convention will connect nearly 700 young Jains from around the world! Daytime sessions will feature  engaging and inspirational speakers about Jainism and the importance of its values to youth. In addition, YJA will be bringing back the Jain Academic Bowl (JAB) and introduce JIA: Jains in Action, an interactive program allowing participants to turn their ideas into reality. Get excited for some diverse and powerful sessions about Jain education, interfaith, lifestyle, college/careers, social impact, and much more as we set out to become Agents of Change!</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="heading">Convention Keynote Speaker</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 margin30">
                    <div class="item-img-wrap ">
                        <img src="/assets/kraft.jpg" class="img-rounded" />
                    </div>
                </div>
                <div class="col-md-7">
                    <h4>Houston Kraft</h4>
                    <p>Houston Kraft is a professional speaker, leadership consultant, and kindness advocate. He has spoken to nearly half a million students, staff, and parents across the country through nearly 400 events sharing his message of compassion, character, leadership, and love. Houston doesn't just inspire people to change for a day. His goal is to inspire a lifestyle - one rooted in character, compassion, and a consistent desire to choose to love people around us (even when that choice is scary, inconvenient, or hard).</p>
                    <p>He is the creator of the <a href="http://www.houstonkraft.com/choose-love-mvmt/">Choose Love Movement</a> and <a href="http://www.characterstrong.com/">CharacterStrong</a> - an app and curriculum that focuses on habit development for your heart. When he isn’t speaking, he is traveling the world with his wife, Harley, or playing a fierce game of laser tag. <a href="http://houstonkraft.com/">Learn more</a> and get excited to meet this Agent of Change in July!</p>
                </div>
                <div class="col-md-7 margin30">
                    <iframe src="https://player.vimeo.com/video/167042550?byline=0" width="599" height="337" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>
    

            <div class="row">
                <div class="col-md-12">
                    <h3 class="heading">Daytime Sessions (HS/College)</h3>
                    <p>Below are the exciting Daytime sessions we have planned for you – hover over the icons to see more! JNF attendees can find their sessions on the <a href="jnf">JNF Page</a>.</p>
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
                    <h3 class="heading">Daytime Programming Team</h3>
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
                                        <img alt="Anish Doshi" class="img-responsive" src="/assets/ChintavShah.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="1">
                                    <img alt="Anjali Doshi" class="img-responsive" src="/assets/KayuriShah.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="2">
                                    <img alt="Foram Shah" class="img-responsive" src="/assets/MahimaShah.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="3">
                                    <img alt="Foram Shah" class="img-responsive" src="/assets/AnjaliDoshi.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="4">
                                    <img alt="Salil Ojha" class="img-responsive" src="/assets/AkashShah.jpg" />
                                    </div>
                                    <div class="item" data-slide-number="5">
                                    <img alt="Siddharth Shah" class="img-responsive" src="/assets/PujaSavla.jpg" />
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
                    <p>Your 2016 Daytime Programming Team consists of Chintav Shah (NJ), Kayuri Shah (DC), and Mahima Shah (NJ).</p>
                    <p>Working with them are Anjali Doshi (IL) and your convention Co-Chairs Akash Shah (CA) and Puja Savla (CA).</p>
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
