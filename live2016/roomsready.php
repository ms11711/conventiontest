<?php

/**
 * Profile
 */

//Initialisation
require_once 'includes/init.php';

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();


//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //get room number
    $roomnum = $_POST["roomnumber"];

    //add to db
    if ($user->roomReady($roomnum)) {  
           
    }

    $query = "SELECT * FROM roomlist WHERE room = ".$roomnum."";
    $roomlist = User::getAllData($query);

    $phonenumbers = array();

    for($i = 0; $i<sizeof($roomlist); $i++){
        $query = "SELECT textnumber FROM user_misc WHERE id = ".$roomlist[$i]["id"]."";
        $mobilenumber = User::getAllData($query);
        echo "<br><br>". $mobilenumber[0]["textnumber"]."<br>";
        array_push($phonenumbers, $mobilenumber[0]["textnumber"]);
    }



    var_dump($roomlist);
    var_dump($phonenumbers);

    //find ids associated with room number

    //assign ids to array for text


    $wsdl = "http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl";

    $client = new SoapClient($wsdl, array(
        'soap_version' => SOAP_1_2,
        'login'        => 'e5a1f2124a22',    
        'password'     => '16eab9710cd46991'));


    $request = new stdclass();

    $request->BroadcastName = 'Room Ready'; 

    $request->ToNumber = $phonenumbers; 

    $request->TextBroadcastConfig = new stdclass(); 
    $request->TextBroadcastConfig->Message = 'Your room is ready, please come to the room key pick up table next to the souvenir pick up in the regisration area.'; 


    $broadcastId = $client->SendText($request);
    //echo "broadcastId: $broadcastId";

 

    
}
 
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

        <link rel="stylesheet" href="css/bootstrap-datetimepicker.css" type="text/css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--must need plugin jquery-->
        <script src="js/jquery.min.js"></script>        

<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-transitions.js"></script>
<script type="text/javascript" src="/js/bootstrap-collapse.js"></script>
 
<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
    </head>

    <body>
 
    <?php include "config/nav.php" ?>

        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Rooms</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide60"></div>
        <div class="container">
 

            <div class="row">
                <div class="col-md-6 margin30">

                    <?php echo $broadcastId; ?>

                    <p>Enter rooms as they are ready</p>
                    <form method="POST" action="roomsready.php">
                        <input name="roomnumber" />
                        <button type="submit" />
                    </form>
                   
                </div>

                <div class="col-md-6 margin30">

 
                </div>
            </div>

 

        </div>

        </div><!--.container-->
        
        <div class="divide60"></div>
        
        <?php include "config/footer.php" ?>

        <!--scripts and plugins -->

 <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js"></script> 
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script type="text/javascript" charset="utf8" src="/js/jquery.dataTables.js"></script>
  <script src="/js/init.js"></script>


 



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
