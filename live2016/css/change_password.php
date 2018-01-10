<?php

/**
 * Change Password
 */

//Initialisation

require_once 'includes/init.php';

//Require the user to be logged in before they can see this page.

Auth::getInstance()->requireLogin();

//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = Auth::getInstance()->getCurrentUser();
  $user->getpassword = $user->password;

    if ($user !== null) {

    $user->currentpassword = $_POST['currentpassword'];
        $user->password = $_POST['password'];
        $user->password_confirmation = $_POST['password_confirmation'];

        if ($user->changePassword()) {
            //Redirect to success page
            Util::redirect('/change_password_success.php');
        }
    }
 }

$page_title = 'Change password';
include 'includes/header.php';
 ?>

<div class="row">
    <h1 class="header">Change Password</h1>
    <div class="divider"></div>
</div>

    <?php if ( ! empty($user->errors)): ?>
     <ul class="errors">
        <?php foreach ($user->errors as $error): ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

 <form method="post" id="changePasswordForm" >

    <div>
      <label for="currentpassword">Current Password</label>
      <div>
        <input class="validate sign-input" placeholder="Enter your Current Password" type="password" id="currentpassword" name="currentpassword" required="required" autofocus="autofocus" />
      </div>
    </div>

    <div>
      <label for="password">New Password</label>
      <div>
        <input class="validate sign-input" placeholder="Enter your New Password" type="password" id="password" name="password" required="required" autofocus="autofocus" />
      </div>
    </div>

    <div>
      <label for="password_confirmation">New Password Again</label>
      <div>
        <input class="validate sign-input" placeholder="Enter your New Password Again" type="password" id="password_confirmation" name="password_confirmation" required="required" />
      </div>
    </div>

    <div>
      <div>
       <button class="btn-large waves-effect waves-light green" type="submit">Change Password
        <i class="material-icons left">done</i>
        </button>
         <a class="btn-large waves-effect waves-light btn-danger" href="/profile.php"><i class="material-icons left">clear</i>Cancel</a>
      </div>
    </div>
  </form>

  <p>Note: Current Password is mandatory for security reasons.<br>
    If you created your account via One Click Social Login, your password was auto generated<br>
    Try Forgot Password to get a new password </p>

<?php include('includes/footer.php'); ?>
