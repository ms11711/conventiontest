<?php

/**
 * Activate new account
 */

//Initialisation
require_once 'includes/init.php';

//Activate the account for the user with the token

if (isset($_GET['token'])) {
    $activate_user = User::activateAccount($_GET['token']);
}

//Set the title,show the page header,and rest of html

$page_title = 'Activate account';
include 'includes/header.php';

?>

<!-- If user activation token is valid and user is activated -->
<?php if ($activate_user == true) : ?>

    <h1>Account Activated</h1>
    <p>Thank you for activating your account! You can now <a href="login.php">login</a>.</p>

<!-- Otherwise If activation token is invalid -->
<?php elseif($activate_user == false): ?>

    <h1>Activation Invalid</h1>
    <p>Unfortunately, Your Account Activation URL is Invalid</p>

<?php endif; ?>

<?php include('includes/footer.php'); ?>
