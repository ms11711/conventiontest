<?php

//Initialisation
require_once 'includes/init.php';
  

 
try {


$user = User::donation($_POST);

	require_once(__DIR__ .'/Stripe/lib/Stripe.php');
	Stripe::setApiKey("sk_live_TsmEP9OQGpvmTstmZh5SEvCX");
 
 $donation = $_POST["donate_amount"]*100;
  
$charge = Stripe_Charge::create(array(
  "amount" => $donation,
  "currency" => "usd", 
  "source" => $_POST['stripeToken'],
  "statement_descriptor" => "YJA2016 Donation",
  "description" => "Donation"
));

  //you can send the file to this email:
  

  if($charge["paid"] == "true"){
 
    $receiptEmail = $_POST['stripeEmail'];
    $token = $_POST['stripeToken'];
    $transaction = $charge["id"]; 
 


    $onPayment = array("transaction" => $transaction, "amount" => $donation/100, "receiptEmail" => $receiptEmail, "id" => $_POST["id"]);
 
    $user->onDonation($onPayment); 

    include 'email_template/donation-made.php'; 

    Util::redirect('/donation_thankyou.php');
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