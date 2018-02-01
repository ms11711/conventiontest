<?php

/**
 * Profile
 */

//Initialisation
require_once 'includes/init.php';

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();


$query = "SELECT * FROM user_details WHERE id = ".$user->id."";
$data = User::getData($query); 


$query = "SELECT * FROM user_misc WHERE id = ".$user->id."";
$complete = User::getData($query);

if($complete["got_info"] == 0){
    Util::redirect('/registration3.php');
}

if($complete["roomate_done"] == 1){
    Util::redirect('/roomate_selected.php');
}


//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($user->saveRoomate($_POST)) {  
        sleep(3); 
        Util::redirect('/roomate_success.php');
    }
}
 
  
 
$query = "SELECT * FROM user_details WHERE id = ".$user->id."";
$data = User::getData($query);


//$query = "SELECT * from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE (user_details.is_board = '0') AND (user_details.gender = '".$data["gender"]"') AND (user_details.agegroup = '".$data["agegroup"]."') AND (user_misc.completed_registration = '1')";

$query = "SELECT * FROM user_details WHERE agegroup = '".$data["agegroup"]."' AND  gender = '".$data["gender"]."'";
$agegroup_users = User::getAllData($query);

function cmp($a, $b)
{
    return strcmp($a["firstname"], $b["firstname"]);
}
 

usort($agegroup_users, "cmp");

/*
while (list($key, $value) = each($agegroup_users)) {
    //Print Value Array
}
*/

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
                              
                       <form id="roomateform" method="POST" action="roomate_test.php">    

                <input type="hidden" name="id" value=<?php echo '"'.$data["id"].'"';?>>



                                <label>Registration Level<span>*</span></label> 
                  <select name="selected" class="form-control" >

                    <?php
                        

                        for($i=0; $i<sizeof($agegroup_users);$i++){
                            echo '<option value="'.$agegroup_users[$i]["id"].'">'.ucfirst(strtolower($agegroup_users[$i]["firstname"])).' '.ucfirst(strtolower($agegroup_users[$i]["lastname"])).' | '.$agegroup_users[$i]["city"].', '.$agegroup_users[$i]["state"].'</option>';

                        }
      

                    ?>

                </select>
 

   

            </div><!--column end-->
                 
 
                </div>

                                <div class="col-md-6 margin30">
                                    <button type="submit" class="btn btn-theme-bg btn-lg">Register</button>
                                </div> 


</form>

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
