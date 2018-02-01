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

$page_title = 'Reset password';
include 'includes/header.php';
 ?>

<div class="row">
    <h1 class="header">Reset Password</h1>
    <div class="divider"></div>
</div>
<?php if (isset($user)): ?>

  <?php if ( ! empty($user->errors)): ?>
    <ul class="errors">
      <?php foreach ($user->errors as $error): ?>
        <li><?php echo $error; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <form method="post" id="resetPasswordForm">
    <input type="hidden" id="token" name="token" value="<?php echo $_GET['token']; ?>" />

    <div class="row">
      <label for="password" >New password</label>
      <div class="col-sm-10">
        <input type="password" placeholder="Enter your new password" class="validate sign-input" id="password" name="password" required="required" autofocus="autofocus" />
      </div>
    </div>

    <div class="row">
      <label for="password_confirmation" >New password again</label>
      <div class="col-sm-10">
        <input type="password" placeholder="Enter your new password again" class="validate sign-input" id="password_confirmation" name="password_confirmation" required="required" />
      </div>
    </div>

    <div class="row">
      <div>
        <button class="btn-large waves-effect waves-light" type="submit">Set Password
              <i class="material-icons right">done</i>
              </button>
      </div>
    </div>
  </form>

<?php else: ?>

  <p>Reset token not found or expired. Please <a href="forgot_password.php">try resetting your password again</a>.</p>

<?php endif; ?>

<?php include('includes/footer.php'); ?>
