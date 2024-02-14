<?php
/* Template Name: Student-profile*/
get_header('student');
$default_img_id = 727;
$user_id = get_current_user_id();
$user = get_userdata($user_id);
$student_description = get_user_meta($user_id, 'student_description', true);
$student_image_id = get_user_meta($user_id, 'user_profile_image');
// If $count is greater than zero.
if (!empty($student_image_id[0])) {
  // User profile image is not empty
  $url = wp_get_attachment_image_url($student_image_id[0]);
} else {
  // User profile image is empty
  $url = wp_get_attachment_url($default_img_id);
}
?>
<section>
  <div class="container">
    <div class="row justify-content-center"> <!-- Centering the column -->
      <div class="col-lg-8">
        <div class="card  mb-4">
          <img src="<?php echo $url; ?>" class="card-img-top" alt="image" style="width: 100px; height:100px; border-radius:50%;">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Student`s Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user->display_name; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Student Bio</p>
              </div>
              <div class="col-sm-9">
                <?php if (!empty($student_description)) { ?>
                  <p class="text-muted mb-0"><?php echo $student_description; ?></p>
                <?php } else {?>
                  <p class="text-muted mb-0">No student description available.</p>
                <?php } ?>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Student`s Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user->user_email ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col text-center">
                <a href="<?php echo get_the_permalink(710); ?>" class="btn btn-primary profileupdate">edit</a>
              </div>
            </div>
          </div>
        </div>
</section>
<?php get_footer('student'); ?>