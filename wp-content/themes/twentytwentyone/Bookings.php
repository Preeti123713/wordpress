<?php
/* Template Name: Bookings */
global $wpdb;
get_header('admin');
$sql = "SELECT Booking.*,payment.user_id FROM booking 
INNER JOIN payment ON booking.payment_id = payment.id";
$bookings = $wpdb->get_results($sql);  
?>
<div class="booking mb-4">
  <div class="booking-inner">
    <?php get_sidebar(); ?>
    <div class="col-md-9">
      <header class="booking-header">
        <div class="title">Bookings</div>
      </header>
     <?php  foreach ($bookings as $object) { 
      $user_id = $object->user_id;
      $user_info = get_userdata($user_id);
      ?>
      <table class="booking-table">
        <thead>
          <tr>
            <th>Student`s Name</th>
            <th>Time</th>
            <th>timeperiod</th>
            <th>Date</th>
            <th>Language</th>
            <th>Level</th>
            <th>Country</th>
            <th>Plan</th>
            <th>Purpose</th>
          </tr>
        </thead>
        <tr>
          <td>
            <p><?php echo $user_info->user_login; ?></p>
          </td>
          <td>
            <?php $bookingTimestamp = $object->booking_date_time;
            $bookingDateTime = date("d-m-y H:i:s",$bookingTimestamp);
            // separate date and time variable using explode function
            list($bookingDate, $bookingTime) = explode(' ', $bookingDateTime); ?>
            <p><?php echo $bookingTime ?></p>
          </td>
          <td>
            <p><?php  echo $object->timeperiod; ?></p>
          </td>
          <td>
            <p><?php echo $bookingDate ?></p>
          </td>
          <td>
          <?php $languages = get_post_meta($object->teacherid,'language'); 
          ?>
            <p><?php echo $languages[0]; ?></p>
          </td>
          <td>
          <?php $levels = get_post_meta($object->teacherid,'level'); 
          ?>
            <p><?php echo $levels[0]; ?></p>
          </td>
          <td>
          <?php $country = get_post_meta($object->teacherid,'country'); 
          ?>
            <p><?php echo $country[0] ?></p>
          </td>
          <td>
            <p><?php echo $object->plans?></p>
          </td>
          <td>
          <?php  $purposes = $object->purpose;  
          ?>
          <p> 
            <?php echo $purposes; ?>
          </p>
          </td>
        </tr>
      </table>
      <?php } ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>