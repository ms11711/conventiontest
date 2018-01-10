<?php

/**
 * Log in a user
 */

//Initialisation

require_once 'includes/init.php';

//Require the user to NOT be logged in before they can see this page
//Dont show this page to logged in users
Auth::getInstance()->requireGuest();

// Generate Token Id and Valid
$token_id = Csrf::getInstance()->getTokenID();
$token_value = Csrf::getInstance()->getToken($token_id);

// Generate Random Form Names
$form_names = Csrf::getInstance()->formNames(array('email', 'password'), false);

//Get checked status of the "remember me" checkbox
$remember_me = isset($_POST['remember_me']);

//Process the submitted form
if (isset($_POST[$form_names['email']], $_POST[$form_names['password']])) {

  $captcha = $_POST['g-recaptcha-response'];

  if (isset($captcha) && !Captcha::verifyCaptcha($captcha)) {
    $error = 'Invalid Captcha';
  } elseif (Csrf::getInstance()->checkValid('post')) {

    $email = $_POST[$form_names['email']];
    $password = $_POST[$form_names['password']];

    if (Auth::getInstance()->login($email,$password,$remember_me)) {
    //Redirect to home page or to intended page,if set
      if (isset($_SESSION['return_to'])) {
       $url = '/'.$_SESSION['return_to'];
       unset($_SESSION['return_to']);
      } else {
          $url = '/registration3.php';
      }
      Util::redirect($url);
      } else {
      $error = "Invalid Login";
      }
    }
    // Regenerate a new random value for the form.
    $form_names = Csrf::getInstance()->formNames(array('email', 'password'), true);

} elseif (isset( $_REQUEST["provider"] )) {
  // the selected provider
  $provider_name = $_REQUEST["provider"];
  if (Auth::getInstance()->socialLogin($provider_name)) {
    if (isset($_SESSION['return_to'])) {
     $url = '/'.$_SESSION['return_to'];
     unset($_SESSION['return_to']);
    } else {
      $url = '/index.php';
    }
    Util::redirect($url);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $config_title; ?> | Login</title>
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

          
          <?php include 'config/nav.php' ?>

        <div class="breadcrumb-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Login</h4>
                    </div>
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide40"></div>



        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">



                    <div role="tabpanel" class="login-regiter-tabs">

                        <!-- Nav tabs -->
                        <!--
                        <ul class="nav nav-tabs text-center" role="tablist"> 
                            <li role="presentation"><a href="registernow">Need an Account? Click here to Register</a></li>
                        </ul>
                        -->

                        <!-- Tab panes -->
                        <div class="tab-content">                       

                            <?php if (isset($error)): ?>
                              <div class="error shift-field"><?php echo $error; ?></div>
                            <?php endif; ?>

                            <div role="tabpanel" class="tab-pane active" id="login">
                                <form method="post" >

                                    <input type="hidden" name="<?= $token_id; ?>" value="<?= $token_value; ?>" />
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="email" class="form-control" id="emailaddress" name="<?php echo $form_names['email']; ?>" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control"id="password" name="<?php echo $form_names['password']; ?>" required="required" placeholder="Password">
                                    </div>                                  
                                    <div class="pull-left">

                                        <p><a href="forgot_password">Forgot password?</a></p>

                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-theme-dark">Login</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div><!--login tab end-->
                             
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="divide40"></div>
          
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
    </body>
</html>
