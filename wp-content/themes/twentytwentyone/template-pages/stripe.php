<?php 
require_once('vendor/autoload.php');

\Stripe\Stripe::setApiKey('sk_test_51OUNypSGWzwjArE7lJ5VQE88roEhuQnefI8qVx0sPYeq6sxW6N1OaWdAui73DEjDAVoRfx2xQVdrDMqpG29n2pip00RC84r9jT');
$intent = \Stripe\PaymentIntent::create([
    'amount' => 1099,
    'currency' => 'usd',
    // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
    'automatic_payment_methods' => [
      'enabled' => 'true',
    ],
  ]);



print_r($intent);
die;

        

?>