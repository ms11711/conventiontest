<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?><?php include "config/db_connect.php" ?>

<?php

Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();
 




 $query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday3PM = '52')";

$phase_one = User::getAllData($query);

 
echo "<strong>Saturday 3 PM</strong><br>";

 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}

echo "<br><br>";


$query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday4PM = '65')";

$phase_one = User::getAllData($query);

echo "<strong>Saturday 4 PM</strong><br>";
 

 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}
 


echo "<br><br>";




$query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Sunday9AM = '124')";

$phase_one = User::getAllData($query);

echo "<strong>Sunday 9 AM</strong><br>";

 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}

echo "<br><br>";

$query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Sunday10AM = '77')";

$phase_one = User::getAllData($query);

echo "<strong>Sunday 10 AM</strong><br>";

 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}
 

echo "<br><br>";




?>