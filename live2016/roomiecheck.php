<?php

/**
 * Profile
 */

//Initialisation
require_once 'includes/init.php';

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

 

$query = "SELECT * FROM user_roomate";
$roomate = User::getAllData($query);

$query = "SELECT * FROM user_details";
$details = User::getAllData($query);


$matchcount = 0;

for($i=0; $i<sizeof($roomate); $i++){ 

    for($j = 0;$j<sizeof($roomate);$j++){

        /*echo "Selected[i]: ".$roomate[$i]["selected"]." ";
        echo "Selected[j]: ".$roomate[$j]["selected"]." <br>";
        echo "Selector[i]: ".$roomate[$i]["selector"]." ";
        echo "Selector[j]: ".$roomate[$j]["selector"]." <br><br>";*/

        if($roomate[$i]["selector"] == $roomate[$j]["selected"]){  

            $selector = $roomate[$i]["selector"];
            $selected = $roomate[$i]["selected"]; 

            if($details[$selector-1]["gender"] == "male"){
                $color = "blue";              

            }

            else if($details[$selector-1]["gender"] == "female"){
                $color = "orange";
            }

            else{
                $color = "black";
            }            



            echo "<span style='color:".$color."'>Selector: ".$roomate[$i]["selector"]." </span>";
            echo " Age: ".$details[$selector-1]["age"].", ".$details[$selector-1]["agegroup"]." | Selected: ".$roomate[$j]["selector"]."  <br>"; 

            if($details[$selected-1]["gender"] == "male"){
                $color = "blue";              

            }

            else if($details[$selected-1]["gender"] == "female"){
                $color = "orange";
            }

            else{
                $color = "black";
            }         

            echo "<span style='color:".$color."'>Selector: ".$roomate[$i]["selected"]." </span>";
            echo " Age: ".$details[$selected-1]["age"].", ".$details[$selected-1]["agegroup"]." | Selected: ".$roomate[$j]["selected"]."  <br>";

            echo "PKEYs (".$roomate[$i]["pkey"].", ".$roomate[$j]["pkey"].")<br><br>";
            $matchcount++;

        }       
      
    }
}


 


echo $matchcount;

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
 
  
        <div class="container">
            <div class="row">
                <div class="col-md-6 margin30">
                  










                </div>
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
