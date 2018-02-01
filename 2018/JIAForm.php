<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?><?php include "config/db_connect.php" ?>

<?php

Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();
 
  
$interest = $_GET["jia"];
$user->jiaInterest($interest);

 if($interest == 0){
 	Util::redirect('/session_registration?schedule=1');

 }

 else{

 	header('Location:https://docs.google.com/forms/d/13HPTnzHJ0GfsXXWBz4W4EYY524hIhYRgYYdLOKhqLRs/viewform?embedded=true');
 }

?>
 