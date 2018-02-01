<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?>

<?php



/*
$query = "SELECT COUNT(*) from user_details INNER JOIN user_payment ON user_details.id = user_misc.id WHERE (user_details.is_board = '0') AND (user_details.gender = 'male') AND (user_details.agegroup = 'JNF') AND (user_misc.completed_registration = '1')";
*/

$query = "SELECT COUNT(*) from user_details INNER JOIN user_payment ON user_details.id = user_payment.id WHERE user_payment.type = 'unsubsidized'";

 

$maleCountJNF = User::getData($query);
$maleRemainingJNF = $maleCountJNF[0];

var_dump($maleRemainingJNF);
echo " ";
//var_dump($maleRemainingJNF);

?>