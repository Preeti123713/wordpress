<?php
/*Template Name:Stdentpayment */
get_header('student');
$user_id = get_current_user_id();
$sql = "SELECT Booking.plans,Booking.teacherid,Booking.plan_price,Booking.payment_id,payment.user_id,payment.payment_date_time,payment.totalamount 
FROM booking 
INNER JOIN payment ON booking.payment_id = payment.id
WHERE payment.user_id = 50;";
$bookings = $wpdb->get_results($sql);
echo "<pre>";
// print_r($bookings);
// foreach($bookings as $key => $property) {
//   echo $property->plans;
// }
$filtered_payments = [];

// Iterate through the array
foreach ($bookings as $object) {
  // Check if user_id is 50 and payment_id matches
  if ($object->user_id == $user_id) {
    $payment_id = $object->payment_id;
    // Check if the payment_id already exists in the filtered payments array
    if (!isset($filtered_payments[$payment_id])) {
      // If not, initialize an array for that payment_id
      $filtered_payments[$payment_id] = [];
    }
    // Add the object to the array for that payment_id
    $filtered_payments[$payment_id][] = $object;
  }
}
// print_r($filtered_payments);
// Function to count the number of objects in each sub-array
function countObjects($filtered_payments) {
  $counts = [];
  foreach ($filtered_payments as $index => $subArray) {
      $counts[$index] = count($subArray);
  }
  return $counts;
}

// Get the counts
$counts = countObjects($filtered_payments);

// Display the counts
foreach ($counts as $index => $count) {
  echo "Index $index: $count objects\n";
}
// foreach($filtered_payments as $index => $array){
//   foreach($array as $object){
//     // Access object properties
//     echo "Plans: " . $object->plans . "\n";
//     echo "Teacher ID: " . $object->teacherid . "\n";
//     echo "Plan Price: " . $object->plan_price . "\n";
//     echo "Payment ID: " . $object->payment_id . "\n";
//     echo "User ID: " . $object->user_id . "\n";
//     echo "Payment Date Time: " . $object->payment_date_time . "\n";
//     echo "Total Amount: " . $object->totalamount . "\n";
//     echo "\n";
//   }
// }


?>
<div class="booking mb-4">
  <div class="booking-inner">
    <div class="col-md-9">
      <header class="booking-header">
        <div class="title">Payment Details</div>
      </header>

      <table class="booking-table">
        <thead>
          <tr>
            <th>Teacher's Name</th>
            <th>Total Price</th>
            <th>Total Price</th>
            <th>Time</th>
            <th>Date</th>
            <th>Payment Breakdown</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($filtered_payments as $index => $paymentArray) { 
            ?>

            <?php foreach ($paymentArray as $paymentDetail) {
               ?>
              <tr>
                <td>Multiple</td>
                <td><?php echo $paymentDetail->totalamount; ?></td>
                <?php
                // Split the string into date and time components
                $datetime = explode(' ', $paymentDetail->payment_date_time);
                $date = $datetime[0];
                $time = $datetime[1];
                ?>
                <td>
                  <p><?php echo $time; ?></p>
                </td>
                <td>
                  <p><?php echo $date; ?></p>
                </td>
                <?php }} ?>
                <td>
                  <div class="container">
                    <div id="accordion">
                      <div class="card">
                        <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#description1">
                            payment breakdown
                          </a>
                        </div>
                        <div id="description1" class="collapse show" data-parent="#accordion">
                          <div class="card-body">
                          <p>heo0034</p>
                          <p>Hi whatsup</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php get_footer('student'); ?>