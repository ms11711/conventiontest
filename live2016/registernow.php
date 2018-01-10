<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?>
<?php


$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE (user_details.is_board = '0') AND (user_details.gender = 'male') AND (user_details.agegroup = 'JNF') AND (user_misc.completed_registration = '1')";

$maleCountJNF = User::getData($query);
$maleRemainingJNF = 100-intval($maleCountJNF[0]);

$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE (user_details.is_board = '0') AND (user_details.gender = 'female') AND (user_details.agegroup = 'JNF') AND (user_misc.completed_registration = '1')";

$femaleCountJNF = User::getData($query);
$femaleRemainingJNF = 100-intval($femaleCountJNF[0]);


$HSWaitlist = 230;
$CWaitlist = 200;
$JNFWaitlist = 220;



$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE /*(user_details.is_board = '0') AND*/ (user_details.agegroup = 'College') AND (user_misc.completed_registration = '1')";

$CountCollege = User::getData($query);
/* $RemainingCollege = $CWaitlist-intval($CountCollege[0]); */
$RemainingCollege = 0;

$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE /*(user_details.is_board = '0') AND*/ (user_details.agegroup = 'High School') AND (user_misc.completed_registration = '1')";

$CountHigh = User::getData($query);
/* $RemainingHigh = $HSWaitlist-intval($CountHigh[0]); */
$RemainingHigh = 0;

$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE /*(user_details.is_board = '0') AND*/ (user_details.agegroup = 'JNF') AND (user_misc.completed_registration = '1')";

$CountJNF = User::getData($query);
/* $RemainingJNF = $JNFWaitlist-intval($CountJNF[0]);  */
$RemainingJNF = 0;

 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $config_title; ?> | Registration Information</title>
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
                        <h4>Registration Information</h4>
                    </div>
                     
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide60"></div>


 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="heading">Register for the 2016 YJA Convention in Los Angeles</h3>
                    <p>
                        Registration fees begin at $339 for HS and College participants and $375 for JNF participants. Your registration fee <strong>includes accommodations, meals and access to all events</strong> for the 4-day event. Also included is a souvenir bag filled with keepsakes such as Jain literature, a souvenir book, and other items.
                    </p>

                    <p><strong>The convention begins on Friday, July 1, 2016 at 1:00 PM and ends on Monday, July 4, 2016 at 11:00 AM.</strong></p>
                </div>
                 
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div role="alert" class="alert alert-danger"><center><strong>ALL age groups</strong> are officially <strong>SOLD OUT</strong>.<br><br> If you were unable to get a spot, we hope to see you at the next YJA convention and other regional YJA events! <!--If you would like to be added to the <strong>waitlist</strong>, please register using the button below and complete Steps 1 and 2 of the registration process. If a spot opens up for your age group, we will contact you via email.--></center></div>
                </div>

                <!--<div class="col-md-2 col-md-offset-5 margin30"><a href="register" class="btn btn-theme-bg btn-lg">Enter Waitlist</a></div> -->

            </div>

       <div class="row">


          <div class="col-md-12 col-sm-12 ">
                <div class="col-md-4 col-sm-12 margin30">
                      <div class="skills-wrapper">
                        <h3 class="heading-progress">High School Registration Spaces Left: <span class="pull-right"><?php echo $RemainingHigh."/".$HSWaitlist ?></span></h3>
                            <div class="progress">
                                <div class="progress-bar" style="width: <?php echo ($RemainingHigh/$HSWaitlist)*100 ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" role="progressbar">
                                </div>
                            </div>
                        </div>
                    
                </div>

                <div class="col-md-4 col-sm-12 margin30">
                      <div class="skills-wrapper">
                        <h3 class="heading-progress">College Registration Spaces Left: <span class="pull-right"><?php $temp = intval($CWaitlist); echo $RemainingCollege."/".$temp ?></span></h3>
                            <div class="progress">
                                <div class="progress-bar" style="width: <?php echo ($RemainingCollege/$CWaitlist)*100 ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" role="progressbar">
                                </div>
                            </div>
                        </div>
                   
                </div>

                <div class="col-md-4 col-sm-12 margin30">
                      <div class="skills-wrapper">
                                <h3 class="heading-progress">JNF Registration Spaces Left: <span class="pull-right"><?php $temp = intval($JNFWaitlist); echo $RemainingJNF."/".$temp ?></span></h3>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo ($RemainingJNF/$JNFWaitlist)*100 ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                    
                </div>


        <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Dates</th> 
                                <th>Registration Phase</th>
                                <tH>High School/ College</th>
                                <th>JNF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">January 25<sup>th</sup> - February 21<sup>st</sup></th> 
                                <td>Phase 1</td>
                                <td>$339</td>
                                <td>$375</td>
                            </tr>
                            <tr>
                                <th scope="row">February 22<sup>nd</sup> - April 30<sup>th</sup></th> 
                                <td>Phase 2</td>
                                <td>$375</td>
                                <td>$410</td>
                            </tr>
                            <tr>
                                <th scope="row">Unsubsidized</th> 
                                <td></td>
                                <td>$425</td>
                                <td>$475</td>
                            </tr>
                        </tbody>
                    </table>


                
  

</div>
                 

                 <div class="row">

                    <div class="col-md-12 col-sm-12 ">
                        <div class="col-md-6 col-sm-12 margin30">

                    <h3 class="heading">Unsubsidized Pricing</h3>

                            To provide each attendee with hotel accommodations, meals, and the opportunity to attend sessions and social events, the actual total cost per person is well over the registration cost. 

                            YJA works very hard in fundraising during the year to help subsidize each attendee's cost of attendance.

                            We would greatly appreciate it if you could help YJA by choosing the "Unsubsidized" pricing option at the time of payment. This would help us raise the money we need to ensure YJA remains affordable for as many potential attendees as possible.
                            </div>

                        <div class="col-md-6 col-sm-12 margin30">

                    <h3 class="heading">Cancellation Policy</h3>
                        <li>All cancellations regardless of reasons prior to <strong>May 11, 2016</strong> will be entitled to 50% refund of all collected fee amount.
                        </li>
                        <li>Cancellations after <strong>May 11, 2016</strong> will be entitled to 25% refund of all collected fee amount.
                        </li>
                        <li>Absolutely no refunds for cancellations shall be given after <strong>June 15, 2016</strong> regardless of reasons.
                        </li>

                        </div>
                    </div>
                 </div>

<!--
                                 <div class="row">

                    <div class="col-md-12 col-sm-12 ">
                        <div class="col-md-12 col-sm-12 margin30">

                    <h3 class="heading">Cancellation Policy</h3>
                        <li>All cancellations regardless of reasons prior to <strong>May 11, 2016</strong> will be entitled to 50% refund of all collected fee amount.
                        </li>
                        <li>Cancellations after <strong>May 11, 2016</strong> will be entitled to 25% refund of all collected fee amount.
                        </li>
                        <li>Absolutely no refunds for cancellations shall be given after <strong>June 15, 2016</strong> regardless of reasons.
                        </li>

                       

                        </div>
                    </div>
                 </div>
 -->

         <div class="row">

                    <div class="col-md-12 col-sm-12 ">
                        <div class="col-md-12 col-sm-12 margin30">

                    <h3 class="heading">Transportation</h3>
                       For questions <a href="contact">Contact Us</a> or visit our <a href="faq">FAQ</a>. We also have <a href="transportation">Transportation</a> page with information about local and international transportation.
                        </div>
                    </div>
                 </div>
 
 



            </div><!--pricing tables 2 simple row end-->

  <p style="text-align:center;">
                        <a href="assets/RulesRegulations2016.pdf" target="_blank" class="btn btn-theme-bg btn-sm">Rules and Regulations</a>
                        <a href="assets/LiabilityWaiver2016.pdf" target="_blank" class="btn btn-theme-bg btn-sm">Waiver of Liability</a>
                    </p>

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
