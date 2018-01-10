<?php

/**
 * Homepage
 */

//Initialization

require_once 'includes/init.php';

$page_title="Contact";
//Show the page header,then rest of the HTML
include 'includes/header.php';

//Sum Captcha
$number1 = rand(1,9);
$number2 = rand(1,9);
$sum = $number1 + $number2;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);
  $userIP = Util::getUserIP();
  $correctsum = $_POST['correctsum'];
  $captcha = $_POST['captcha'];
  if ($correctsum == $captcha) {
$body =<<<EOT
<p>From: $email</p>
<p>Name: $name</p>
<p>From IP: $userIP </p>
<p>Message:<br> $message</p>
EOT;
    if (Mail::send('User',Config::CONTACT_EMAIL,'New Message via Contact Form',$body)) {
        unset($name,$email,$message);
        $confirm = "Thank You for sumbitting the message,We will get back to you soon";
    } else {
      $error = "Unfortunately,There was a problem in submitting your message.Please try again later";
    }
  } else {
    $error = "Captcha you entered is Invalid";
  }
}
 ?>

<div class="row">
  <div class="col s12">
    <h1 class="header">Contact</h1>
    <div class="divider"></div>
  </div>
</div>

<?php
  if (isset($error)) {
    echo "<p class='error'>$error</p>";
  } else {
    if (isset($confirm)) {echo $confirm;}
  }
 ?>

<div class="row">
    <form class="col s8" id="contactForm" method="post">

      <input type="hidden" name="correctsum" value="<?php echo $sum; ?>"/>

      <div class="row">
        <div class="col s12">
          <label for="name">Name</label>
          <div>
          <input class="sign-input" id="name" placeholder="Your Name" type="text" name="name" class="validate" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <label for="email">Email</label>
          <div>
          <input class="sign-input" id="email" placeholder="Your Email" type="email" name="email" class="validate" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
          </div>
        </div>
      </div>
       <div class="row">
        <div class="col s12">
          <label for="textarea">Message</label>
          <div>
          <textarea id="textarea" placeholder="Your Message" name="message" rows="40" class="materialize-textarea sign-input"><?php echo isset($message) ? htmlspecialchars($message) : ""; ?></textarea>
          </div>
        </div>
      </div>
       <div class="row">
        <div class="col s12">
          <label for="captcha">Solve: <?php echo $number1.' + '.$number2.' = '; ?></label>
          <div>
          <input id="captcha" class="sign-input" placeholder="<?php echo $number1.' + '.$number2.' = '; ?>" type="number" name="captcha" class="validate">
          </div>
        </div>
      </div>

        <button class="btn waves-effect waves-light" type="submit" name="submitMessage">Send Message
      <i class="material-icons right">send</i>
      </button>
    </form>
 </div>

<?php include('includes/footer.php'); ?>
