<?php 
/*Template Name:Stdentpayment */
get_header('student');
$user_id = get_current_user_id();
echo $user_id;
$sql = "SELECT Booking.teacherid, payment.user_id,payment.payment_date_time,payment.totalamount 
FROM booking 
INNER JOIN payment ON booking.payment_id = payment.id
WHERE payment.user_id = 50;";
$bookings = $wpdb->get_results($sql);  
echo "<pre>";
print_r($bookings);

  
//     echo "User ID: " . $obj->user_id . ", ";
//     echo "Payment Date Time: " . $obj->payment_date_time . ", ";
//     echo "Total Amount: " . $obj->totalamount . "<br>";
// }
?>
<div class="booking mb-4">
  <div class="booking-inner">
    <div class="col-md-9">
      <header class="booking-header">
        <div class="title">Bookings</div>
      </header>
    
      <table class="booking-table">
        <thead>
          <tr>
            <th>Teacher`s Name</th>
            <th>Total Price</th>
            <th>Time</th>
            <th>Date</th>
          </tr>
        </thead>
        <?php foreach ($bookings as $obj) { ?>
        <tr>
            <td>
            <p><?php  echo "Teacher ID: " . $obj->teacherid;?></p>
          </td>
          <td>
            <p><?php  echo  $obj->totalamount ;?></p>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>
<?php get_footer('student'); ?> 