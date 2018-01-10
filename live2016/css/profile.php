<?php

/**
 * Profile
 */

//Initialisation
require_once 'includes/init.php';

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();

//Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($user->saveProfile($_POST)) {
        sleep(3);
        // Redirect to show page
        Util::redirect('/profile.php');
    }
}

//Set the title,show the page header,then the rest of HTML
$page_title = 'Profile';
include 'includes/header.php';
 ?>

<h1>Profile</h1>
<hr>



<div class="row">
    <div class="col s6">
  <table class="hoverable">
    <tbody>
    <tr>
    <td>Name</td>
    <td><?php echo ucfirst(htmlspecialchars($user->name)); ?></td>
    </tr>
    <tr>
    <td>Email Address</td>
    <td><?php echo htmlspecialchars($user->email); ?></td>
    </tr>
    <tr>
    <td>Password</td>
    <td><a href="/change_password.php">Change Password</a></td>
    </tr>
    </tbody>
  </table>
  </div><!-- end of col -->
</div><!-- end of row -->


<div class="row">
<div class="col s6">
<h5>Personal Details</h5>
<form method="post" id="profileForm" autocomplete="off">
  <div class="row">
    <label for="gender" class="control-label col-sm-2">Gender</label>
    <div class="col-sm-10">
      <select class="validate sign-input browser-default" id="gender" name="gender" >
          <option value="" disabled <?php echo ($user->gender !== 'Male' || 'Female' || 'Other')?"selected":""; ?>>Choose your option</option>
          <option value="Male" <?php echo ($user->gender == 'Male')?"selected":""; ?>>Male</option>
          <option value="Female" <?php echo ($user->gender == 'Female')?"selected":""; ?>>Female</option>
          <option value="Other" <?php echo ($user->gender == 'Other')?"selected":""; ?>>Other</option>
      </select>
    </div>
  </div>

  <div class="row">
    <label for="address">Address</label>
    <div>
      <!-- <input class="validate sign-input" type="text" id="address" name="address" value="<?php echo htmlspecialchars($user->address); ?>" /> -->
      <textarea id="textarea" placeholder="Your Address" name="address" rows="40" class="validate materialize-textarea sign-input"><?php echo htmlspecialchars($user->address); ?></textarea>
    </div>
  </div>

  <div class="row">
    <label for="phone" class="control-label col-sm-2">Phone No.</label>
    <div class="col-sm-10">
      <input class="validate sign-input" id="phone" name="phone" type="number" value="<?php echo htmlspecialchars($user->phone); ?>" />
    </div>
  </div>

  <div class="row">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn waves-effect waves-light green" onClick="this.form.submit(); this.disabled=true; this.value='Sending…';  "><i class="material-icons left">save</i>Save</button>
      <a class="btn waves-effect waves-light btn-danger" href="/profile.php"><i class="material-icons left">clear</i>Cancel</a>
    </div>
  </div>
</form>
</div> 
</div>



<?php include('includes/footer.php'); ?>
