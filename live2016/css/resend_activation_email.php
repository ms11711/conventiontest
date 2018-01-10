<?php
/**
 * Forgotten password form
 */

//Initialisation

require_once 'includes/init.php';

//Require the user to NOT be logged in before they can see this page.
Auth::getInstance()->requireGuest();

//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message_sent = Auth::getInstance()->sendActivationEmailAgain($_POST['email']);
}

//Set the title,show header,and rest of html
$page_title = 'Forgotten Password';
include 'includes/header.php';
?>

<div class="row">

    <h1 class="header">Resend Activation Email</h1>
    <div class="divider"></div>

</div>
<?php if (isset($message_sent)): ?>

    <?php if ($message_sent == true) {
        echo "<p>An activation email has been mailed.Please check your mail box for the token link</p>";
    } else {
        echo "<p>This email is not registered or already activated.</p>";
        }
    ?>

<?php else: ?>

    <form method="post">
        <div class="row">
            <div class="input-field col s4">
            <input class="validate"  id="email" name="email" type="email" required="required" />
              <label for="email" class="control-label col-sm-2">Email Address</label>
              </div>
        </div>

        <div class="row">
          <button class="btn-large waves-effect waves-light" type="submit">Send Activation Link
            <i class="material-icons right">replay</i>
              </button>
        </div>
    </form>

<?php endif; ?>

<?php include('includes/footer.php'); ?>
