<?php
/* Template Name: Booked Teachers*/
get_header('student');
$user_id = get_current_user_id();
$sql = "SELECT Booking.teacherid,Booking.booking_date_time,payment.user_id,payment.totalamount FROM booking INNER JOIN payment ON booking.payment_id = payment.id WHERE payment.user_id = $user_id ORDER BY payment_date_time DESC";
$bookings = $wpdb->get_results($sql);
?>
<div class="booking mb-4">
  <div class="booking-inner">
    <div class="col-md-9">
      <header class="booking-header">
        <div class="title">Booked Teacher</div>            
      </header>
      <table class="booking-table">
        <thead>
          <tr>
            <th>Teacher`s Name</th>
            <th>Total Price</th>
            <th>DateTime</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($bookings as $booking) {                                       
              ?>
            <tr>
              <td>
                <p><?php echo get_the_title($booking->teacherid); ?></p>
              </td>
              <td>
                <p><?php echo $booking->totalamount; ?></p>
              </td>
              <?php
              $timestamp = $booking->booking_date_time;
              $date = date('d-m-Y h:i:s a',$timestamp);
              ?>
                <td><?php  echo $date; ?></td>
              </td>
            </tr>
          </tbody>
          <?php } ?>
      </table>
    </div>
  </div>
</div>
<?php get_footer('student'); ?>