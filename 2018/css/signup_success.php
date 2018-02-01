<?php

/**
 * Signup success page
 */

// Initialisation
require_once 'includes/init.php';

// Set the title, show the page header, then the rest of the HTML
$page_title = 'Sign Up Success';
include 'includes/header.php';

?>

<h1>Sign Up</h1>
<hr>
<h3>Success!</h3>
<p>Thank you for signing up.Please check your email for an account activation message </p><br>
<p>Please note account activation email might take upto 5 minutes depending upon your email provider</p>

<?php include('includes/footer.php'); ?>
