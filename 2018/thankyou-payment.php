<?php



require_once 'includes/init.php';
require_once(__DIR__ .'/Stripe/lib/Stripe.php');
Stripe::setApiKey("sk_test_2BtCVH4YUL6votmheiI4VvDN");



// Retrieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$event_json = json_decode($input);

var_dump($event_json);
// Do something with $event_json

  include 'test_transmission.php';
http_response_code(200); // PHP 5.4 or greater


 /*

  $receiptEmail = $_POST['stripeEmail'];
  $token = $_POST['stripeToken'];
  $transaction = $charge["id"];
  $paid = "1";

  $onPayment = array("token" => $token, "transaction" => $transaction, "amount" => $amount, "paid" => $paid, "receiptEmail" => $receiptEmail);

  $user->onPayment($onPayment);

  include 'test_transmission.php';
 */


  ?>