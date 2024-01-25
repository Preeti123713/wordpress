<?php 
/* Template Name: MyStudent */
get_header('admin');
$user_id = get_current_user_id();
$user_info = get_user_meta($user_id,'teacher_post_id');
$teacher_id = $user_info[0];

$sql = "SELECT booking.teacherid, payment.user_id,payment.payment_status FROM booking
INNER JOIN payment ON booking.payment_id = payment.id";
$bookings = $wpdb->get_results($sql);  
$userIds = array();
$payment_status = array();
// Loop through the array
foreach ($bookings as $item) {
  // Check if teacherid 
  if ($item->teacherid == $teacher_id) {
      // Collect user_id
      $userIds[] = $item->user_id;
      $payment_status[]=$item->payment_status;
  }
}

?>
<div class="booking mb-4">
        <div class="booking-inner">
        <?php get_sidebar();?>
       <div class="col-md-9">
          <header class="booking-header">
            <div class="title">MyStudent</div>
          </header>
    
          <table class="booking-table">
            <thead>
              <tr>
                <th>Student`s Name</th>
                <th>Student`s Email</th>
                <th>Booking Payment</th>
              </tr>
            </thead>
            <?php foreach($userIds as $id){
              $user_info = get_userdata($id); 
              ?>
            <tr>
              <td>
                <p><?php echo $user_info->user_login;?></p>
              </td>
              <td>
                <p><?php echo $user_info->user_email; ?>
                </p>
              </td>
           
              <td>
                <p><?php echo $payment_status[0] ?></p>
              </td>
            </tr>
            <?php }?>
          </table>
       </div>
    </div>
</div>
<?php get_footer(); ?>