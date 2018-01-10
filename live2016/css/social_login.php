<?php

/**
 * Log in a user
 */

//Initialisation

require_once 'includes/init.php';

//Require the user to NOT be logged in before they can see this page
Auth::getInstance()->requireGuest();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) == true) {
        if (Auth::getInstance()->socialLoginViaEmail($_POST['email'])) {
            if (isset($_SESSION['return_to'])) {
         $url = '/'.$_SESSION['return_to'];
         unset($_SESSION['return_to']);
        } else {
          $url = '/index.php';
        }
        Util::redirect($url);
        }
    } else {
    $emailerror = "Please enter valid email address";
    }
}

$page_title = 'Social Login';
include 'includes/header.php';
?>

<h1>One Last Step</h1>
<p class="error"><?php echo isset($emailerror) ? $emailerror : ""; ?></p>
<p>Note:Social Provider like Twitter and Yahoo doesn't give access to your email Address.</p>
<p>So, Please Enter Your Email Address</p>

<form method="post">
    <div class="row">
        <div class="col s6">
            <label for="email">Email Address :</label>
            <input class="validate" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" type="email" autofocus="autofocus" required="required" />
            <button type="submit" class="btn btn-success">OK</button>
        </div>
    </div>
</form>
