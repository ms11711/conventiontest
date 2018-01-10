<?php

/**
 * Profile
 */

//Initialisation
require_once 'includes/init.php';

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

//Set the title,show the page header,then the rest of HTML
$page_title = 'Locked Page';
include 'includes/header.php';
 ?>

 <h1>Members Area</h1>
<hr>
<p>This is a locked webpage</p>

<?php include('includes/footer.php'); ?>
