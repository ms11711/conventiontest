<?php

/**
 * Profile
 */

//Initialisation
require_once 'includes/init.php';

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

Auth::getInstance()->requireSubscriber();
//Set the title,show the page header,then the rest of HTML
$page_title = 'Locked Page';
include 'includes/header.php';
 ?>

 <h1>Subscriber Section</h1>
<hr>
<p>This is a locked webpage</p>

<?php include('includes/footer.php'); ?>