<?php

/**
 * Change password success page
 */

// Initialisation
require_once 'includes/init.php';

// Set the title, show the page header, then the rest of the HTML
$page_title = 'Change password';
include 'includes/header.php';

?>

<h1>Change Password</h1>
<hr>
<p>Success! Your password is changed. Go back to profile <a href="profile.php">Profile</a>.</p>

<?php include('includes/footer.php'); ?>
