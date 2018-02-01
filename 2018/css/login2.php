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
          $url = '/index.php';
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

//Set the title,show the page header,then the rest of html
$page_title = 'Login';
include 'includes/header.php';
?>

    <div class="row">
      <div class="col s12">
        <h1 class="header">Login</h1>
        <div class="divider"></div>
      </div>
    </div>

    <?php if (isset($error)): ?>
      <div class="error shift-field"><?php echo $error; ?></div>
    <?php endif; ?>

  <div class="row">
    <form method="post" class="col l6 m8 s12">
      <input type="hidden" name="<?= $token_id; ?>" value="<?= $token_value; ?>" />
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input class="validate" type="email" required="required" id="email" name="<?php echo $form_names['email']; ?>" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"  />
          <label for="email">Email Address</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">https</i>
          <input class="validate" type="password" id="password" name="<?php echo $form_names['password']; ?>" required="required" />
          <label for="password">Password</label>
        </div>
      </div>

      <div class="row">
        <div class="col s12">
        <div class="shift-field">
          <input id="remember_me" class="filled-in" name="remember_me" type="checkbox" value="1"
                   <?php if ($remember_me): ?>checked="checked"<?php endif; ?>/>
          <label for="remember_me">Remember Me</label>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12">
          <div class="shift-field">
              <label for="captcha">Captcha</label>
              <div class="captcha-box">
                <div class="g-recaptcha" data-sitekey="<?php echo Config::RECAPTCHA_SITEKEY ?>"></div>
              </div>
          </div>
        </div>
      </div>

      <div class="row">
          <div class="col s12">
          <div class="shift-field">
          <button class="btn-large waves-effect waves-light green" type="submit">Login
            <i class="material-icons right">send</i>
          </button>
          <a href="forgot_password.php"> &nbsp; Forgot Password ?</a>
          </div>
          </div>
           <div class="col s12">
           <div class="shift-field">
          <p>Doesn't Have an Account?</p>
          <a class="btn-large waves-effect waves-light deep-purple white-text" href="signup.php">
            <i class="material-icons right">create</i>
            Create Account
          </a>
          <a href="resend_activation_email.php"> &nbsp; Resend Activation Email</a>
          </div>
          </div>
      </div>
    </form>

  </div><!-- end of row -->


    <div class="row">
      <form class="col l6 m8 s12">
      <div class="shift-field">
       <fieldset class="col s12">
          <legend>Or Use One Click Social Login</legend>

          <a href="login.php?provider=facebook" class="tooltipped" data-position="bottom" data-delay="200" data-tooltip="Facebook"><img src="images/facebook.png" /></a>
          <a href="login.php?provider=google" class="tooltipped" data-position="bottom" data-delay="200" data-tooltip="Google+"><img src="images/googleplus.png" /></a>
          <a href="login.php?provider=twitter" class="tooltipped" data-position="bottom" data-delay="200" data-tooltip="Twitter"><img src="images/twitter.png" /></a>
          <a href="login.php?provider=linkedin" class="tooltipped" data-position="bottom" data-delay="200" data-tooltip="Linkedin"><img src="images/linkedin.png" /></a>
          <a href="login.php?provider=yahoo" class="tooltipped" data-position="bottom" data-delay="200" data-tooltip="Yahoo"><img src="images/yahoo.png" /></a>
          <a href="login.php?provider=foursquare" class="tooltipped" data-position="bottom" data-delay="200" data-tooltip="Foursquare"><img src="images/foursquare.png" /></a>
          <a href="login.php?provider=Vkontakte" class="tooltipped" data-position="bottom" data-delay="200" data-tooltip="Vkontakte"><img src="images/vkontakte.png" /></a>
      </fieldset>
      </form>
      </div>
    </div><!-- end of row -->




<?php include('includes/footer.php'); ?>
