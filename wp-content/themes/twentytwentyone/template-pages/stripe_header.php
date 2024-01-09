<?php 
// Include the Stripe configuration file 
include('../../../../wp-config.php');
 
// Include the Stripe PHP SDK library 
require_once 'vendor/autoload.php'; 

// Set API key 
\Stripe\Stripe::setApiKey('sk_test_51OUNypSGWzwjArE7lJ5VQE88roEhuQnefI8qVx0sPYeq6sxW6N1OaWdAui73DEjDAVoRfx2xQVdrDMqpG29n2pip00RC84r9jT'); 

// Set content type to JSON 
header('Content-Type: application/json'); 

// Retrieve JSON from POST body 
$jsonStr = file_get_contents('php://input'); 
$jsonObj = json_decode($jsonStr); 
?>