<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?><?php include "config/db_connect.php" ?>
<?php include "config/config.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?php echo $config_title; ?> | Meet the Board</title>
        <meta name="description" <?php echo 'content="'.$config_description.'"'; ?> >
        <meta name="keywords" <?php echo 'content="'.$config_keywords.'"'; ?> >

        <?php echo $config_favicon; ?>   

        <!--sweet alerts-->
        <link href="css/sweetalert.css" rel="stylesheet">


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
        <script src="js/sweetalert.min.js" type="text/javascript"></script>

    </head>
    <body>

       <?php include "config/nav.php" ?>

        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Meet the 2016 YJA Convention Board</h4>
                    </div>
                   
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide60"></div>
        <div class="container">

            <div class="row">
                <div class="col-sm-3 margin40">
                    <ul class="list-unstyled side-nav">
                        <?php 

                            // Committee array, place committees in order you want appeared on website.
                            $committee = array("Co-Chairs","Adult Volunteer","Daytime", "Fundraising", "Hospitality", "Jain Networking Forum", "Public Relations", "Registration", "Security", "Site", "Social", "Souvenirs");                       
                            print_side_nav($committee); 

                        ?>
                    </ul>
                </div><!--sidebar col end-->
                <div class="col-sm-9">
                    <div class="row">
                <div class="col-md-4">
                    <h3 class="heading">YJA Convention Board</h3>
                    <p>
                        Introducing the 2016 YJA Convention Board members. This year we have an extremely talented group of individuals that have gone above and beyond in their efforts to organize the best YJA convention yet!
                    </p> 
                </div>
                <div class="col-md-8">
                    <img src="images/board3.jpg" class="img-responsive" alt="">
                </div>
            </div><!--about intro-->


            <!-- <div class="divide60"></div> -->
            
            <?php 

            // Below is a loop that runs through the database in order to output all the board data

            // Parse through database and place data into objects

            $SQL = "SELECT * FROM board";
            $result = mysql_query($SQL);

            $board_members = array();
          
            while ($row = mysql_fetch_object($result)) {
                array_push($board_members, $row); 
            }

            // Increment to each item in committee array

            for($i= 0; $i<sizeof($committee);$i++){

                // Echo title for each committee
                print_title($committee[$i]);                

                echo '<div class="row">';

                // Check each member to see if position is part of the current committee element

                for($j=0; $j<sizeof($board_members); $j++){
                
                    // If the person committee matches the current committee, echo out their info

                    if($board_members[$j]->position == $committee[$i]){
                        print_committee_member($board_members[$j]);       
                    }
                }

                echo '</div>';
            }

            function print_title($committee){
                echo '<div id="'.$committee.'" class="divide80"></div><div  class="row"><div class="col-md-12 margin20"><h3 class="heading">'.$committee.'</h3></div></div>';
            }

            function print_committee_member($board_members){
                echo '
                <div class="col-md-3 margin20">
                    <div class="team-wrap">
                        <img src="images/'.$board_members->image.'" class="img-responsive" alt="">
                        <h4>'.$board_members->name.'</h4>
                        <span>'.$board_members->position.'</span>
                        <p>
                             
                        </p>
                           <ul class="list-inline">

                        <button class="bio'.$board_members->key.' btn btn-theme-dark btn-lg btn-sweet-alert">Read my Bio!</button>        ';


                    if($board_members->facebook){
                        echo ' <li>
                                <a href="https://www.facebook.com/'.$board_members->facebook.'" class="social-icon-sm si-border si-facebook">
                                    <i class="fa fa-facebook"></i>
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>';
                    }

                    if($board_members->instagram){
                        echo ' <li>
                                <a href="https://www.instagram.com/'.$board_members->instagram.'" class="social-icon-sm si-border si-instagram">
                                    <i class="fa fa-instagram"></i>
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>';
                    }
                          
                    if($board_members->twitter){
                        echo ' <li>
                                <a href="https://twitter.com/'.$board_members->twitter.'" class="social-icon-sm si-border si-twitter">
                                    <i class="fa fa-twitter"></i>
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>';
                    }

                    if($board_members->linkedin){
                        echo ' <li>
                                <a href="https://www.linkedin.com/in/'.$board_members->linkedin.'" class="social-icon-sm si-border si-linkedin">
                                    <i class="fa fa-linkedin"></i>
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>';
                    }


                    echo '     </ul><!--social-->
                    </div><!--team-wrap-->
                </div><!--team col-->';

                echo '<script type="text/javascript">

                        document.querySelector(".bio'.$board_members->key.'").onclick = function () {
                            swal({
                                title: "'.$board_members->name.'",
                                text: "'.$board_members->bio.'"
                            });
                        };

                    </script>       ';
            }
 
            function print_side_nav($committee){

                for($i=0; $i<sizeof($committee); $i++){
                    echo '<li><a href="#'.$committee[$i].'" class="active">'.$committee[$i].'</a></li>';
                }

            }

 

                ?>

            </div>


                </div>
            </div>
        </div><!--side navigation container-->
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

        <?php include "config/db_close.php" ?>

    </body>
</html>

