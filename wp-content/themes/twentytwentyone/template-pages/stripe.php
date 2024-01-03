<?php 
require_once('./vendor/stripe/stripe-php/init.php');
// print_r($_POST);
echo $_POST[ 'stripeToken' ];
//  if ( !empty( $_POST[ 'stripeToken' ] ) ) {
//     require_once( './vendor/stripe/stripe-php/init.php' );

//     // Get Token, Card and User Info from Form
//     $amount = $_POST[ 'amount' ] *100;
//     $email = $_POST[ 'email' ];
//     $card_no = $_POST[ 'card_number' ];
//     $card_cvc = $_POST[ 'card_cvc' ];
//     $card_exp_month = $_POST[ 'card_exp_month' ];
//     $card_exp_year = $_POST[ 'card_exp_year' ];
//     $token = $_POST[ 'stripeToken' ];
        
// $customer= $stripe->customers->create([
//     'line_items' => [
//       [
//         'price_data' => [
//           'currency' => 'usd',
//           'product_data' => ['name' => 'T-shirt'],
//           'unit_amount' => 2000,
//         ],
//         'quantity' => 1,
//       ],
//     ],
//     'mode' => 'payment',
//     'success_url' => 'http://localhost:4242/success.html',
//     'cancel_url' => 'http://localhost:4242/cancel.html',
//   ]);
// };

?>