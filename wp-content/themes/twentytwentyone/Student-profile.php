<?php
/* Template Name: Student-profile*/
get_header('student');
$current_user = wp_get_current_user();
$default_img_id = 727;
$user_id = $current_user->ID;
$student_description = get_user_meta( $user_id,'student_description'); 
$student_image_id = get_user_meta($user_id,'user_profile_image');
// If $count is greater than zero.
if (!empty($student_image_id[0])) {
  // User profile image is not empty
  $url = wp_get_attachment_image_url($student_image_id[0]);
} else{
  // User profile image is empty
  $url = wp_get_attachment_url($default_img_id);
}
echo $url;

?>
<div class="profile-container">
  <div class="card profile-card" style="width: 18rem;">
  <img src='<?php echo $url;?>' class="card-img-top profile-image" alt="profile_image" >
  <div class="card-body">
    <h5 class="card-title profilecard"><?php echo $current_user->display_name;?></h5>
    <p class="card-text"><?php echo $current_user->user_email; ?></p>
    <p class="card-text"><?php echo $student_description[0];?></p>
    <a href="<?php echo get_the_permalink(710);?>" class="btn btn-primary profileupdate">Update</a>
  </div>
</div>
</div>
<?php get_footer('student'); ?>

