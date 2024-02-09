<?php
/* Template Name: Profile */
global $wpdb;
get_header('admin');
$user_id = get_current_user_id();
$user = wp_get_current_user($user_id);
$teacher_id = get_user_meta($user_id, 'teacher_post_id', true);
$teacher_exp =  get_post_meta($teacher_id, 'teaching_experience', true);
$attachment_id = get_post_meta($teacher_id, 'post_attachment', true);
$image_url = wp_get_attachment_url($attachment_id[0]);
$post_content = get_post_field('post_content', $teacher_id);
$level = get_post_meta($teacher_id, 'level', true);
$language = get_post_meta($teacher_id, 'language', true);
$country = get_post_meta($teacher_id, 'country', true);
?>
<section>
  <div class="container">
    <div class="row justify-content-center"> <!-- Centering the column -->
      <div class="col-lg-8">
        <div class="card  mb-4">
          <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_1280.png" class="card-img-top" alt="..." style="width: 100px; height:100px; border-radius:50%;">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Teacher`s Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo get_the_title($teacher_id); ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Teacher Bio</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $post_content; ?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Teacher Qualification</p>
              </div>
              <div class="col-sm-9">
                <?php if (count($attachment_id) !== 0) {
                  foreach ($attachment_id as $key => $id) {
                    $image_url = wp_get_attachment_url($attachment_id[$key]); ?>
                    <img src="<?php echo $image_url; ?>" alt="demo_image" width="100px" height="100px">


                <?php }
                } ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Teaching Experience</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $teacher_exp; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Teacher`s Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $user->user_email; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Level</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $level; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Language</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $language; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Country</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $country; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col text-center">
                <a href="<?php echo get_the_permalink(648) ?>" class="btn btn-primary">Edit Profile</a>
              </div>
            </div>
          </div>
        </div>
</section>

<?php get_footer(); ?>