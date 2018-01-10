<?php

/**
 * Reset password success page
 */

// Initialisation
require_once 'includes/init.php';

// Set the title, show the page header, then the rest of the HTML
$page_title = 'Reset password';
include 'includes/header.php';

?>

<h1>Reset Password</h1>
<hr>
<h3>Success!</h3>
<p>Your password has been successfully reset. You can now <a href="login.php">Log In</a>.</p>

<?php include('includes/footer.php'); ?>
