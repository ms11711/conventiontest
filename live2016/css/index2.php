<?php

/**
 * Homepage
 */

//Initialization

require_once 'includes/init.php';

//Show the page header,then rest of the HTML
include 'includes/header.php';

?>

<div class="row">
  <div class="col s12">
    <h1 class="header">Home</h1>
    <div class="divider"></div>
  </div>
</div>

<div class="row">
    <div class="col s12">
<?php if (Auth::getInstance()->isLoggedIn()): ?>
    <h4> Welcome, <a href="/profile.php"> <?php echo ucfirst(htmlspecialchars(Auth::getInstance()->getCurrentUser()->name)); ?></a></h4>
<?php else: ?>
    <h4>Hello Guest,<br><br><a href="signup.php">Sign Up</a> or <a href="login.php">Login</a></h4>
<?php endif; ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>
