<?php require_once 'includes/init.php'; ?>
<?php include "config/config.php" ?><?php include "config/db_connect.php" ?>

<?php

Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();
 

 

$query = "SELECT COUNT(*) from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday9AM = '13' AND user_details.gender = 'male')";

$phase_one = User::getAllData($query);

 
echo "Saturday 9 am Males Casual: ".$phase_one[0][0]."<br>";



$query = "SELECT COUNT(*) from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday9AM = '13' AND user_details.gender = 'female')";

$phase_one = User::getAllData($query);

echo "Saturday 9 am Females Casual: ".$phase_one[0][0]."<br>";



$query = "SELECT COUNT(*) from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday10AM = '18' AND user_details.gender = 'male')";

$phase_one = User::getAllData($query);

echo "Saturday 10 am Males Casual: ".$phase_one[0][0]."<br>";

$query = "SELECT COUNT(*) from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday10AM = '18' AND user_details.gender = 'female')";

$phase_one = User::getAllData($query);

echo "Saturday 10 am Females Casual: ".$phase_one[0][0]."<br>";


echo "<br><br>";





 

 $query = "SELECT COUNT(*) from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday9AM = '14' AND user_details.gender = 'male')";

$phase_one = User::getAllData($query);

echo "Saturday 9 am Males Serious: ".$phase_one[0][0]."<br>";



 

 $query = "SELECT COUNT(*) from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday9AM = '14' AND user_details.gender = 'female')";

$phase_one = User::getAllData($query);

echo "Saturday 9 am Females Serious: ".$phase_one[0][0]."<br>";



$query = "SELECT COUNT(*) from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday10AM = '17' AND user_details.gender = 'male')";

$phase_one = User::getAllData($query);

echo "Saturday 10 am Males Serious: ".$phase_one[0][0]."<br>";

 


$query = "SELECT COUNT(*) from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday10AM = '17' AND user_details.gender = 'female')";

$phase_one = User::getAllData($query);

echo "Saturday 10 am Females Serious: ".$phase_one[0][0]."<br>";







echo "<br><br>";












 $query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday9AM = '13' AND user_details.gender = 'male')";

$phase_one = User::getAllData($query);

 
echo "<strong>Saturday 9 am Males Casual</strong><br>";

 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}

echo "<br>";


$query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday10AM = '18' AND user_details.gender = 'male')";

$phase_one = User::getAllData($query);

echo "<strong>Saturday 10 am Males Casual</strong><br>";
 

 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}
 


echo "<br><br>";




$query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday9AM = '13' AND user_details.gender = 'female')";

$phase_one = User::getAllData($query);

echo "<strong>Saturday 9 am Females Casual</strong><br>";

 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}

echo "<br>";
$query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday10AM = '18' AND user_details.gender = 'female')";

$phase_one = User::getAllData($query);

echo "<strong>Saturday 10 am Females Casual</strong><br>";

 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}
 

echo "<br><br>";




 $query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday9AM = '14' AND user_details.gender = 'male')";

$phase_one = User::getAllData($query);

echo "<strong>Saturday 9 am Males Serious</strong> <br>";
 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}
 
echo "<br>";


$query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday10AM = '17' AND user_details.gender = 'male')";

$phase_one = User::getAllData($query);

echo "<strong>Saturday 10 am Males Serious</strong> <br>";
 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}
 
echo "<br><br>";

 
 $query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday9AM = '14' AND user_details.gender = 'female')";

$phase_one = User::getAllData($query);

echo "<strong>Saturday 9 am Females Serious</strong><br>";
 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}
 
echo "<br>";
$query = "SELECT * from user_sessions INNER JOIN user_details ON user_details.id = user_sessions.userid WHERE (user_sessions.Saturday10AM = '17' AND user_details.gender = 'female')";

$phase_one = User::getAllData($query);

echo "<strong>Saturday 10 am Females Serious</strong><br>";

 for($i=0; $i<sizeof($phase_one); $i++){
	echo $phase_one[$i]["id"]." ".$phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"]."<br>";
}
 




?>