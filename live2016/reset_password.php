<?php

/**
 * Reset Password
 */

//Initialisation

require_once 'includes/init.php';

//Require the user to NOT be logged in before they can see this page

Auth::getInstance()->requireGuest();

//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = User::findForPasswordReset($_POST['token']);

    if ($user !== null) {
        $user->password = $_POST['password'];
        $user->password_confirmation = $_POST['password_confirmation'];

        if ($user->resetPassword()) {

            //Redirect to success page
            Util::redirect('/reset_password_success.php');
        }
    }
 } else { // GET

    //Find the user based on token
    if (isset($_GET['token'])) {
        $user = User::findForPasswordReset($_GET['token']);
    }
 }
 

 ?>

<?php include "config/config.php" ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $config_title; ?> | Forgot My Password</title>
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
                        <h4>Reset Password</h4>
                    </div>
                    
                </div>
            </div>
        </div><!--breadcrumbs-->
        <div class="divide60"></div>



        <div class="container">

 <div class="row">
                <div class="col-sm-6 col-sm-offset-3">



                    <div role="tabpanel" class="login-regiter-tabs">

                   
                        <!-- Tab panes -->
                        <div class="tab-content">                       

                            <?php if (isset($error)): ?>
                              <div class="error shift-field"><?php echo $error; ?></div>
                            <?php endif; ?>



 
<?php if (isset($user)): ?>

  <?php if ( ! empty($user->errors)): ?>
    <ul class="errors">
      <?php foreach ($user->errors as $error): ?>
        <li><?php echo $error; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>



 <div role="tabpanel" class="tab-pane active" id="login">

  <form method="post" id="resetPasswordForm">
    <input type="hidden" id="token" name="token" value="<?php echo $_GET['token']; ?>" />

                  <h3 class="heading">Reset Password</h3>
                                <p>
                                    Enter a new password below to change your password.
                                </p> 

    <div class="form-group">
      <label for="password" >New password</label> 
        <input type="password" placeholder="Enter your new password"  class="form-control" id="password" name="password" required="required" autofocus="autofocus" />
       
    </div>

    <div class="form-group">
      <label for="password_confirmation" >Confirm Password</label> 
        <input type="password" placeholder="Enter your new password again"  class="form-control" id="password_confirmation" name="password_confirmation" required="required" />
    
    </div>

    <div class="pull-right"> 
        <button class="btn btn-theme-dark" type="submit">Change Password 
              </button> 
    </div>
  </form>

<?php else: ?>

  <p>Reset token not found or expired. Please <a href="forgot_password.php">try resetting your password again</a>.</p>

<?php endif; ?>

     </div><!--login tab end-->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="divide80"></div>


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
