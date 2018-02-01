<?php

/**
 * Profile
 */

//Initialisation
require_once 'includes/init.php';

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();


$query = "SELECT * FROM user_misc WHERE id = ".$user->id."";
$complete = User::getData($query);

if($complete["got_info"] == 0){
    Util::redirect('/registration3.php');
}
  
 
$query = "SELECT * FROM user_details WHERE id = ".$user->id."";
$data = User::getData($query);

$query = "SELECT * FROM user_emergency WHERE id = ".$user->id."";
$emergency = User::getData($query);

$query = "SELECT * FROM user_insurance WHERE id = ".$user->id."";
$insurance = User::getData($query);

$query = "SELECT * FROM user_payment WHERE id = ".$user->id."";
$payment = User::getData($query);


?>
<?php include "config/config.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $config_title; ?> | My Profile</title>
        <meta name="description" <?php echo 'content="'.$config_description.'"'; ?> >
        <meta name="keywords" <?php echo 'content="'.$config_keywords.'"'; ?> >

        <?php echo $config_favicon; ?>   



        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- custom css (blue color by default) -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
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
                        <h4>My Account</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide60"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 margin30">
                    <h3 class="heading">Account Information</h3>
                    <p>Your account information will be available to edit and view in a few days. Some basic info is shown below.</p>
                    <?php 
                        if ($data["is_waitlist"] == 1) {
                            echo "You have been placed in the waitlist. When a spot opens up we will contact you.";
                            # code...
                        }
                        else if($payment["paid"] == 0){
                            echo '<p>You have not paid your registration dues. You will not be registered for YJA until the payment has been made.</p><a href="/process_payment.php" class="btn btn-theme-bg btn-lg">Make Payment</a>';
                        }

                        else if ($payment["paid"] == 1){

                            echo '
                                    <label style="font-weight:bold;">Name:</label> '.$data["firstname"].' '.$data["lastname"].'
                                    <bR><label style="font-weight:bold;">Address:</label> '.$data["address1"].', '.$data["city"].', '.$data["state"].' '.$data["zipcode"].' 
                                    <br><label style="font-weight:bold;">Phone:</label> '.$data["primaryphone"].' 
                                    <br><label style="font-weight:bold;">Registration Level:</label> '.$data["agegroup"];

                        }

                    ?>
                </div>

                <div class="col-md-6 margin30">
                    <?php 
                        if ($payment["paid"] == 1 && $data["agegroup"] == "JNF") {
                            echo '<h3 class="heading">JNF Facebook Group</h3>';
                            echo '<p>If you are interested in joining the JNF Facebook group, please <a href="https://www.facebook.com/groups/jnf2016/"><strong>click here</strong></a>.</p>';
                        }

                    ?>
                </div>
            </div>

            <div class="divide40"></div>

            </div><!--column end-->
                 
            </div>
        </div><!--.container-->
        
        <div class="divide60"></div>
        
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
