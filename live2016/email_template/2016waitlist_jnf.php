<?php

/*Database connection*/

require_once 'includes/init.php'; 
include "config/config.php";
include "config/db_connect.php";

$list_id = "48084538384182498";

//Get the list of information from database



//Change tyhe table name 
$SQL = "SELECT * from user_details INNER JOIN user_misc ON user_details.id = user_misc.id AND user_misc.completed_registration = '0' AND user_details.is_waitlist = '1' AND user_details.agegroup = 'JNF Waitlist'";

$list = User::getAllData($SQL); 

// var_dump($list);

//$result = mysql_query($SQL);

$address_json = array();
$recipient_json = array();


for($i = 0; $i<sizeof($list); $i++){
  
    $temp_address = array(); 
    $name = $list[$i]["firstname"];
    $email = $list[$i]["emailaddress"];
    $temp_address = array_push_assoc($temp_address, "name", $name);
    $temp_address = array_push_assoc($temp_address, "email", $email);

    $address_json = array_push_assoc($address_json, "address", $temp_address);
 
    array_push($recipient_json, $address_json);

}

 

$split_email = array_chunk($recipient_json, 999);

for ($i = 0; $i < sizeof($split_email); $i++){

  $id = date("YmdHis");
  $f_id = $id."-".$i;

  $file = $f_id.'.txt';
  echo $file;
  echo "<br>";
  $final_json = array();
  echo $f_id;
  echo "<br>";
  echo "<br>";

  $final_json = array_push_assoc($final_json, "id", $f_id);
  $final_json = array_push_assoc($final_json, "name", "2016Attendees");
  $final_json = array_push_assoc($final_json, "recipients", $split_email[$i]);
  $final_json = json_encode($final_json);
  file_put_contents($file, $final_json);

  var_dump($final_json);

 
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://api.sparkpost.com/api/v1/recipient-lists");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);

  curl_setopt($ch, CURLOPT_POST, TRUE);

  curl_setopt($ch, CURLOPT_POSTFIELDS, $final_json);

  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "Authorization: f9fa29e2b705380748ca51b10c4ed65d1ac013e2"
  ));

  $response = curl_exec($ch);
  curl_close($ch); 
  

}





$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.sparkpost.com/api/v1/transmissions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"return_path\": \"bounce@yja.org\", 
  \"recipients\": {
    \"list_id\": \"".$f_id."\"
  }, 
  \"content\": {
    \"template_id\": \"waitlist-update-jnf\"
  }
}");



curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: f9fa29e2b705380748ca51b10c4ed65d1ac013e2"
));

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);

 

function array_push_assoc($array, $key, $value){
  $array[$key] = $value;
  return $array;
}
  
?>
