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
$RemainingCollege = $CWaitlist-intval($CountCollege[0]); 

$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE /*(user_details.is_board = '0') AND*/ (user_details.agegroup = 'High School') AND (user_misc.completed_registration = '1')";

$CountHigh = User::getData($query);
$RemainingHigh = $HSWaitlist-intval($CountHigh[0]); 

$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE /*(user_details.is_board = '0') AND*/ (user_details.agegroup = 'JNF') AND (user_misc.completed_registration = '1')";

$CountJNF = User::getData($query);
$RemainingJNF = $JNFWaitlist-intval($CountJNF[0]); 


$totalCount = $CountCollege[0] + $CountHigh[0] + $CountJNF[0];
$remainingCount = $RemainingCollege + $RemainingHigh + $RemainingJNF;


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?php echo $config_title; ?></title>
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
        <!--Flipclock css-->
        <link href="css/flipclock.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?php echo $config_favicon; ?>    

    </head>
    <body>

<?php include 'config/nav.php' ?>

        <div class="coming-soon">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text-center">   
                        <h2 style="color:white;">July 1<sup>st</sup> 2016 - July 4<sup>th</sup> 2016</h2>
                        <h3 style="color:white;">Los Angeles, CA </h3>
                        <!--<div class="count-down-1" id="clock"></div>-->
                        <a href="videos" class="btn btn-theme-bg btn-sm" style="margin-right:20px;"><strong>Watch Convention Videos</strong></a>
                        <a href="souvenirbook" class="btn btn-theme-bg btn-sm"><strong>Download Souvenir Book</strong></a>
                        <br><br>
                        <a href="https://www.surveymonkey.com/r/yja2016" target="_blank" class="btn btn-theme-bg btn-sm"><strong>Fill Out Convention Survey</strong></a>
                        <br><br>
                        <a href="letter" class="btn btn-theme-bg btn-sm"><strong>A Letter from the Co-Chairs</strong></a>
                    </div>
                </div>
            </div>
        </div><!--coming soon image-->
        <div class="divide60"></div>
        <div class="container about-event-continer">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="center-heading">
                        <h2>About YJA</h2>
                        <span class="center-line"></span>
                    </div>
                    <p class="margin40">
                        Every two years, YJA brings together hundreds of Jains from across the country to learn together and build long-lasting friendships. With thought-provoking speakers, engaging social events and more, we're excited to celebrate YJA's 25th anniversary by bringing the convention experience of a lifetime to sunny Los Angeles, CA. There are a limited number of spaces to attend YJA 2016 - register now to join us as we become Agents of Change!
                    </p>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 margin40">
                            <div class="event-digit-box">
                                <!--<h1 class="counter"><?php echo $totalCount ?></h1>-->
                                <h1 class="counter">650</h1>
                                <h4>Registered</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 margin40">
                            <div class="event-digit-box">
                                <h1 class="counter">129</h1>
                                <h4>Sessions</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 margin40">
                            <div class="event-digit-box">
                                <h1 class="counter">105</h1>
                                <h4>Speakers</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 margin40">
                            <div class="event-digit-box">
                                <h1 class="counter">0</h1>
                                <!--<h1 class="counter"><?php echo $remainingCount ?></h1>-->
                                <h4>Spaces left</h4>
                            </div>
                        </div>
                    </div>
                    <!--<a href="registernow" class="btn btn-lg btn-theme-dark">Register Now</a>-->
                </div>
            </div>     
        </div><!--event about end-->
        <div class="divide60"></div>


<div class="blue-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 margin30">
                        <div class="services-box wow animated fadeInDown">
                            <div class="services-box-icon"> 
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>Daytime Programming</h4>
                                <p>Welcome to Daytime Programming at the 2016 Young Jains of America (YJA) Convention! This convention will connect nearly 700 young Jains from around the world! Daytime sessions will feature ... </p>
                                   <a href="daytime" class="btn btn-theme-dark btn-sm">Continue Reading</a></div>
                        </div><!--service box-->
                    </div>
                     <div class="col-sm-4 margin30">
                        <div class="services-box wow animated fadeInDown">
                            <div class="services-box-icon"> 
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>Social Events</h4>
                                <p>Join us in sunny LA at the 2016 YJA convention for a weekend of social events you won’t forget! As Agents of Change, your first mission is to Meet Every Last Agent (M.E.L.A) in our carnival-style training modules that will prepare you for the weekend ahead. Then join us for our ... 
                                    </p><a href="social" class="btn btn-theme-dark btn-sm">Continue Reading</a></div>
                        </div><!--service box-->
                    </div>
                    <div class="col-sm-4 ">
                        <div class="services-box wow animated fadeInUp">
                            <div class="services-box-icon"> 
                            </div><!--services icon-->
                            <div class="services-box-info">
                                <h4>Jain Networking Forum</h4>
                                <p>
                                   Jain Networking Forum (JNF) is designed for Jains between the ages of 21-29 and has the goal of fostering professional and social relationships. It provides attendees the opportunity ... </p><a href="jnf" class="btn btn-theme-dark btn-sm">Continue Reading</a></div>
                        </div><!--service box-->
                    </div>
                </div>
            </div>
        </div><!--full wide 2 columns content end-->
<!--        <div class="divide60"></div> -->



        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 text-center">
                    <div class="soon-inner">
                     
                        <div class="divide40"></div>
                       <ul class="clearfix list-inline text-center">
                            <li> <a href="https://www.facebook.com/youngjains" target="_blank" class="social-icon si-dark si-dark-round si-facebook">
                                <i class="fa fa-facebook"></i>
                                <i class="fa fa-facebook"></i>
                            </a></li>
                           <li> <a href="https://twitter.com/YJAtweets" target="_blank" class="social-icon si-dark si-dark-round si-twitter">
                                <i class="fa fa-twitter"></i>
                                <i class="fa fa-twitter"></i>
                            </a></li>
                           <li> <a href="https://www.instagram.com/youngjainsofamerica/" target="_blank" class="social-icon si-dark si-dark-round si-instagram">
                                <i class="fa fa-instagram"></i>
                                <i class="fa fa-instagram"></i>
                            </a></li>
                            <li> <a href="https://www.youtube.com/user/YJA2012/feed?&ab_channel=YoungJainsofAmerica" target="_blank" class="social-icon si-dark si-dark-round si-youtube">
                                <i class="fa fa-youtube"></i>
                                <i class="fa fa-youtube"></i>
                            </a></li>
                       
                       
                        </ul>
                    </div>
                </div>
            </div>
            <div class="divide20"></div>

            <div class="text-center soon-copyright">Jainism is a philosophy that believes in self growth. Via its three jewels concept of right vision, right knowledge, and right conduct, it conveys that any individual via clarity, curiosity, and action can progress towards their ultimate goal. This ideal can be applied to not only self improvement, but also social impact. Change complements time. As we shift into the next quarter century of YJA, this convention aims to foster change and growth for the future. The 2016 YJA Convention will focus on providing and manifesting these three jewels to help create progressive change within ourselves and our communities.</div>

            <div class="divide20"></div>

            <div  class="text-center soon-copyright">2016 YJA Convention | Hosted by: <a href="http://yja.org">Young Jains of America</a> | In Partnership with: <a href="http://jaincenter.org">The Jain Center of Southern California</a></div>
        </div>
        <div class="divide30"></div>

   
        <!--scripts and plugins -->
        <!--must need plugin jquery-->
        <script src="js/jquery.min.js"></script>  
        <script src="js/jquery-migrate.min.js"></script>  
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
        <!--page js-->
        <script src="js/jquery.countdown.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#clock').countdown('2016/07/01 16:00:00', function (event) {
                    var $this = $(this).html(event.strftime(''
                            + '<div class="counts"><span>%w</span> <p>weeks</p></div> '
                            + '<div class="counts"><span>%d</span> <p>days</p></div> '
                            + '<div class="counts"><span>%H</span> <p>hr</p></div> '
                            + '<div class="counts"><span>%M</span> <p>min</p></div> '
                            + '<div class="counts"><span>%S</span> <p>sec</p></div>'));
                });
            });


//Newsletter
// Checking subcribe form when focus event
            $('.assan-newsletter input[type="text"], .assan-newsletter input[type="email"]').live('focus keypress', function () {
                var $email = $(this);
                if ($email.hasClass('error')) {
                    $email.val('').removeClass('error');
                }
                if ($email.hasClass('success')) {
                    $email.val('').removeClass('success');
                }
            });
            // Subscribe form when submit to database
            $('.assan-newsletter').submit(function () {
                var $email = $(this).find('input[name="email"]');
                var $submit = $(this).find('input[name="submit"]');
                var email_pattern = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i;
                if (email_pattern.test($email.val()) === false) {
                    $email.val('Please enter a valid email address!').addClass('error');
                } else {
                    var submitData = $(this).serialize();
                    $email.attr('disabled', 'disabled');
                    $submit.attr('disabled', 'disabled');
                    $.ajax({// Subcribe process with AJAX
                        type: 'POST',
                        url: 'mailchimp/process-subscribe.php',
                        data: submitData + '&action=add',
                        dataType: 'html',
                        success: function (msg) {
                            if (parseInt(msg, 0) !== 0) {
                                var msg_split = msg.split('|');
                                if (msg_split[0] === 'success') {
                                    $submit.removeAttr('disabled');
                                    $email.removeAttr('disabled').val(msg_split[1]).addClass('success');
                                } else {
                                    $submit.removeAttr('disabled');
                                    $email.removeAttr('disabled').val(msg_split[1]).addClass('error');
                                }
                            }
                        }
                    });
                }

                return false;
            });
        </script>
    </body>
</html>
