<?php

require_once 'includes/init.php';
/*
$query = "SELECT COUNT(*) from user_details INNER JOIN user_misc ON user_details.id = user_misc.id WHERE (user_details.is_board = '0') AND (user_details.agegroup = 'College') AND (user_misc.completed_registration = '1')";



WHERE paymentTime < '2016-2-2 23:59:59' AND paymentTime > '2016-2-2 00:00:00'";



*/


//Phase 1 people

$query = "SELECT * from user_payment INNER JOIN user_misc ON user_payment.id = user_misc.id INNER JOIN user_details ON user_details.id = user_payment.id WHERE (paymentTime < '2016-2-21 23:59:59') AND (paymentTime > '2016-1-24 00:00:00') AND (user_misc.completed_registration = '1')";

$phase_one = User::getAllData($query);

//var_dump($phase_one);
$data_holder = array();

for($i=0; $i<sizeof($phase_one);$i++){
	switch ($phase_one[$i]['agegroup']) {
		case 'JNF':
			if(($phase_one[$i]["type"] == "subsidized") && ($phase_one[$i]["donation"] > 0)){
				$sub_donations = $sub_donations + intval($phase_one[$i]["donation"]);
				$row = array('donationID' => $phase_one[$i]["id"], 'donorName' => $phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"], 'donorEmail' => $phase_one[$i]["receiptEmail"], 'donorAmount' => $phase_one[$i]["donation"]);
				array_push($data_holder, $row);
			}
			else if(($phase_one[$i]["type"] == "unsubsidized") && ($phase_one[$i]["donation"] > 100)){
				$donated = intval($phase_one[$i]["donation"])-100-intval($phase_one[$i]["refunds"]); 
				$unsub_donations = $unsub_donations + $donated;
				$row = array('donationID' => $phase_one[$i]["id"], 'donorName' => $phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"], 'donorEmail' => $phase_one[$i]["receiptEmail"], 'donorAmount' => $donated);
				array_push($data_holder, $row);

			}
			break;

		case 'College':
			if(($phase_one[$i]["type"] == "subsidized") && ($phase_one[$i]["donation"] > 0)){
				$sub_donations = $sub_donations + intval($phase_one[$i]["donation"]);
				$row = array('donationID' => $phase_one[$i]["id"], 'donorName' => $phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"], 'donorEmail' => $phase_one[$i]["receiptEmail"], 'donorAmount' => $phase_one[$i]["donation"]);
				array_push($data_holder, $row);
			}
			else if(($phase_one[$i]["type"] == "unsubsidized") && ($phase_one[$i]["donation"] > 86)){
				$donated = intval($phase_one[$i]["donation"])-86-intval($phase_one[$i]["refunds"]); 
				$unsub_donations = $unsub_donations + $donated;
				$row = array('donationID' => $phase_one[$i]["id"], 'donorName' => $phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"], 'donorEmail' => $phase_one[$i]["receiptEmail"], 'donorAmount' => $donated);
				array_push($data_holder, $row);

			}
			break;

		case 'High School':
			if(($phase_one[$i]["type"] == "subsidized") && ($phase_one[$i]["donation"] > 0)){
				$sub_donations = $sub_donations + intval($phase_one[$i]["donation"]);
				$row = array('donationID' => $phase_one[$i]["id"], 'donorName' => $phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"], 'donorEmail' => $phase_one[$i]["receiptEmail"], 'donorAmount' => $phase_one[$i]["donation"]);
				array_push($data_holder, $row);
			}
			else if(($phase_one[$i]["type"] == "unsubsidized") && ($phase_one[$i]["donation"] > 86)){
				$donated = intval($phase_one[$i]["donation"])-86-intval($phase_one[$i]["refunds"]); 
				$unsub_donations = $unsub_donations + $donated;
				$row = array('donationID' => $phase_one[$i]["id"], 'donorName' => $phase_one[$i]["firstname"]." ".$phase_one[$i]["lastname"], 'donorEmail' => $phase_one[$i]["receiptEmail"], 'donorAmount' => $donated);
				array_push($data_holder, $row);

			}
			break;
		
		default:
			# code...
			break;
	}
}

echo "Subsidized Donations: ".$sub_donations." Unsubsidized Donations: ".$unsub_donations;

var_dump($data_holder);


?>


