<?php

//Initialisation
require_once 'includes/init.php';
include "config/config.php"; 

//Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

$user = Auth::getInstance()->getCurrentUser();

$query = "SELECT * FROM user_details WHERE id = ".$user->id."";
$user_details = User::getData($query);

$query = "SELECT * FROM user_payment WHERE id = ".$user->id."";
$payment = User::getData($query);

$agegroup = $payment["agegroup"];
$type = $payment["type"];

if (isset($_POST["donation"])){
  $donation = intval($_POST["donation"])*100;
}

else{$donation = "0";}

switch ($agegroup) {
    case "High School":
        if($type == "subsidized"){
            $amount = $config_stripe_HSSub;
        }
            
        else if ($type == "unsubsidized") {
            $amount = $config_stripe_HSSub;
            $taxded = $config_HSTax;
            $donation = intval($taxded) + $donation;
        }

        else 
            $error = "error";
        break;

    case "College":
        if($type == "subsidized"){
            $amount = $config_stripe_CSub;
        }
            
        else if ($type == "unsubsidized") {
            $amount = $config_stripe_CSub;
            $taxded = $config_CTax;
            $donation = intval($taxded) + $donation;
        }

        else 
            $error = "error";
        break;

    case "JNF":
        if($type == "subsidized"){
            $amount = $config_stripe_JNFSub;
        }
            
        else if ($type == "unsubsidized") {
            $amount = $config_stripe_JNFSub;
            $taxded = $config_JNFTax;
            $donation = intval($taxded) + $donation;
        }

        else 
            $error = "error";
        break;
    default:
        echo "Error";
}

 
 

try {

	require_once(__DIR__ .'/Stripe/lib/Stripe.php');
	Stripe::setApiKey("sk_live_TsmEP9OQGpvmTstmZh5SEvCX");
 
 

// Create a Customer
$customer = Stripe_Customer::create(array(
  "source" => $_POST['stripeToken'],
  "email" => $user_details["emailaddress"],
  "description" => "Customer ID: ".$user_details["id"]
  )
);
 

$charge = Stripe_Charge::create(array(
  "amount" => $amount + $donation,
  "currency" => "usd",
  "receipt_email" => $receiptEmail,
  "customer" => $customer->id,
  "statement_descriptor" => "YJA2016 Registration",
  "description" => $user_details["firstname"]. " " .$user_details["lastname"]. " ".$agegroup. " Registration - ". $type
));

  //you can send the file to this email:
  

  if($charge["paid"] == "true"){

    echo "true"; 
    $receiptEmail = $_POST['stripeEmail'];
    $token = $_POST['stripeToken'];
    $transaction = $charge["id"];
    $paid = "1";

    $onPayment = array("token" => $token, "transaction" => $transaction, "amount" => $amount/100, "paid" => $paid, "receiptEmail" => $receiptEmail, "donation" => $donation/100, "customerID" => $customer->id);

    $user->onPayment($onPayment); 

    $amount = $amount + $donation;
    //Send payment receipt
    include 'email_template/payment-made.php'; 

    //Send Donation Email receipt
    if ($donation > 0){
      include 'email_template/donation-made.php';
    }

    Util::redirect('/account.php');
  }
  





}

catch(Stripe_CardError $e) {
	
}

//catch the errors in any way you like

 catch (Stripe_InvalidRequestError $e) {
  // Invalid parameters were supplied to Stripe's API
  echo "invalid para";

} catch (Stripe_AuthenticationError $e) {
  // Authentication with Stripe's API failed
  // (maybe you changed API keys recently)

} catch (Stripe_ApiConnectionError $e) {
  // Network communication with Stripe failed
} catch (Stripe_Error $e) {

  // Display a very generic error to the user, and maybe send
  // yourself an email
} catch (Exception $e) {

  // Something else happened, completely unrelated to Stripe
}
?>