<?php




//Initialisation
require_once 'includes/init.php';

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();


$query = "SELECT * FROM user_misc WHERE id = ".$user->id."";
$complete = User::getData($query);
 
 
 
$query = "SELECT * FROM user_details WHERE id = ".$user->id."";
$data = User::getData($query);



$query = "SELECT * FROM user_details WHERE agegroup = '".$data["agegroup"]."' AND  gender = '".$data["gender"]."'";
$agegroup_users = User::getAllData($query);
 
$json_response = json_encode($arr);

# Optionally: Wrap the response in a callback function for JSONP cross-domain support
if($_GET["callback"]) {
    $json_response = $_GET["callback"] . "(" . $json_response . ")";
}

# Return the response
echo $json_response;


?>