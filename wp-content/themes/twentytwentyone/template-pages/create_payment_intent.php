<?php 
require_once 'stripe_header.php';

print_r($_POST);
// $paymentIntent = $stripe->paymentIntents->retrieve($_GET['payment_intent']);
// echo json_encode(array('client_secret' => $paymentIntent->client_secret));
// echo  json_encode($paymentIntent);
// print_r($paymentIntent);
// Define the product item price and convert it to cents
// $product_price = round(20*100);

// try { 
//     // Create PaymentIntent with amount, currency and description
//     $paymentIntent = \Stripe\PaymentIntent::create([ 
//         'amount' => $product_price,
//         'currency' => 'USD', 
//         'description' => 'some data', 
//         'automatic_payment_methods' => [ 
//             'enabled'=>'true' 
//         ], 
//     ]); 
    
//     $output = [ 
//         'paymentIntentId' => $paymentIntent->id, 
//         'clientSecret' => $paymentIntent->client_secret 
//     ]; 
    
//     echo json_encode($output); 
// } catch (Error $e) {
//     http_response_code(500); 
//     echo json_encode(['error' => $e->getMessage()]); 
// } 
?>