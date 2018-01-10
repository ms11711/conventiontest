<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?><?php include "config/db_connect.php" ?>
<?php include "config/config.php" ?>

<?php


$SQL = "SELECT * FROM Sessions";
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
        <title><?php echo $config_title; ?> | Sessions</title>
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
        .fa {
            color:#ff8824;
        }
        .fa:hover {
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
                        <h4>Grid Text 4 columns</h4>
                    </div>
                    <div class="col-sm-6 hidden-xs text-right">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Portfolio</a></li>
                            <li>Grid Text 4 columns</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide80"></div>
        <div class="container">

            <ul class="filter list-inline">
                <li><a class="active" href="#" data-filter="*">Show All</a></li>
                <li><a href="#" data-filter=".Interfaith">Interfaith</a></li>
                <li><a href="#" data-filter=".SocialImpact">Social Impact</a></li>
                <li><a href="#" data-filter=".Lifestyle">Lifestyle</a></li>
                <li><a href="#" data-filter=".Career">Career</a></li>
                <li><a href="#" data-filter=".Education">Education</a></li>
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

                    if((($sessions[$i]->hscap > 0) || ($sessions[$i]->ccap > 0)) && ($day == "Saturday")){
                        $category = str_replace(' ', '', $sessions[$i]->category);

                        if(($sessions[$i]->title) != ($sessions[$i-1]->title)) {
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

                    if((($sessions[$i]->hscap > 0) || ($sessions[$i]->ccap > 0)) && ($day == "Sunday")){
                        $category = str_replace(' ', '', $sessions[$i]->category);

                        if(($sessions[$i]->title) != ($sessions[$i-1]->title)) {
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
                <li><a href="#" data-filter=".Interfaith">Interfaith</a></li>
                <li><a href="#" data-filter=".SocialImpact">Social Impact</a></li>
                <li><a href="#" data-filter=".Lifestyle">Lifestyle</a></li>
                <li><a href="#" data-filter=".Career">Career</a></li>
                <li><a href="#" data-filter=".Education">Education</a></li>
            </ul>





        </div><!--container-->

        <div class="divide60"></div>
   

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


    </body>
</html>
