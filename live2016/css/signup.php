<?php

/**
 * Sign Up a New User
 */

//Initialisation
require_once 'includes/init.php';

//Require the user to NOT be logged in before they can see this page
Auth::getInstance()->requireGuest();

//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = User::signup($_POST);

    if (empty($user->errors)) {

    //Redirect to Signup Success Page
    Util::redirect('/signup_success.php');
    exit;
    }

} elseif (isset( $_REQUEST["provider"] )) {    // One Click Social Login
  // the selected provider
  $provider_name = $_REQUEST["provider"];

  if (Auth::getInstance()->socialauth($provider_name)) {
    if (isset($_SESSION['return_to'])) {
     $url = '/'.$_SESSION['return_to'];
     unset($_SESSION['return_to']);
    } else {
      $url = '/index.php';
    }
    Util::redirect($url);
  }
}

//Set the title,show the page header,then the rest of HTML
$page_title = 'Sign Up';
include 'includes/header.php';

?>

<div class="row">
    <h1 class="header">Sign Up</h1>
    <div class="divider"></div>
</div>

<?php if (isset($user)): ?>
  <ul class="errors">
    <?php foreach ($user->errors as $error): ?>
      <li><?php echo $error; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
<div class="row">
    <form method="post" id="signupForm" class="col l8 m8 s12">
      <div class="signup-field">
        <label for="name">Name</label>
        <div>
        <i class="material-icons prefix">person</i>
        <input class="validate sign-input" placeholder="Enter your Name" id="name" name="name" required="required" type="text" value="<?php echo isset($user) ? htmlspecialchars($user->name) : ''; ?>" />
        </div>
      </div>

  <div class="signup-field">
    <label for="email">Email Address</label>
    <div>
      <i class="material-icons prefix">email</i>
      <input class="validate sign-input" placeholder="Enter your Valid Email" id="email" name="email" required="required" type="email" value="<?php echo isset($user) ? htmlspecialchars($user->email) : ''; ?>" />
    </div>
  </div>

  <div class="signup-field">
    <label for="password">Password</label>
    <div >
      <i class="material-icons prefix">lock</i>
      <input class="validate sign-input" placeholder="Enter your Password" type="password" id="password" name="password" required="required" pattern=".{5,}" title="minimum 5 characters" />
    </div>
  </div>

  <div class="signup-field">
      <label for="password_confirmation">Repeat Password</label>
      <div>
        <i class="material-icons prefix">lock</i>
        <input class="validate sign-input" placeholder="Enter your Password Again" type="password" id="password_confirmation" name="password_confirmation" required="required" />
      </div>
  </div>

  <div class="signup-field">
      <label for="captcha">Captcha</label>
      <div class="captcha-box">
        <div class="g-recaptcha" data-sitekey="<?php echo Config::RECAPTCHA_SITEKEY ?>"></div>
      </div>
  </div>

  <div >
    <div>
      <button class="btn-large waves-effect waves-light purple" type="submit">Sign Up
            <i class="material-icons right">create</i>
      </button>
    </div>
  </div>
</form>
<br>
<div class="row">
      <form class="col l4 m8 s12">
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
</div><!-- end of row -->

<?php include('includes/footer.php'); ?>
