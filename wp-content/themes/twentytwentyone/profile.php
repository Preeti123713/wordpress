<?php
/* Template Name: Profile */
get_header('admin');
$user_id = get_current_user_id();
$user_info = get_user_meta($user_id, 'teacher_post_id');
$teacher_id = $user_info[0];
$post_data = get_post($teacher_id);
$post_meta = get_post_meta($teacher_id, 'post_attachment');
$teacher_exp =  get_post_meta($teacher_id, 'teaching_experience');
$attachment_id = $post_meta[0][0];
?>
<div class="booking mb-4">
  <div class="booking-inner">
    <?php get_sidebar(); ?>
    <div class="col-md-9">
      <header class="booking-header">
        <div class="title">Profile</div>
      </header>
      <table class="booking-table">
        <thead>
          <tr>
            <th>Teacher`s Name</th>
            <th>Teacher Bio</th>
            <th>Teacher Qualification</th>
            <th>Teaching Experience</th>
            <th>Teacher`s Email</th>
            <th>Edit Profile</th>
          </tr>
        </thead>
        <tr>
          <td>
            <p><?php echo $post_data->post_title; ?></p>
          </td>
          <td>
            <p><?php echo $post_data->post_content; ?></p>
          </td>
          <?php foreach ($attachment_id as $key => $value) {
            $image = wp_get_attachment_image_url($value); ?>
          <td>
              <p><img src="<?php echo $image; ?>" alt="teacher_qualification" height="500px" width="500px;"></p>
            </td>
          <?php } ?>
          <td>
            <p><?php echo $teacher_exp[0]; ?></p>
          </td>
          <td>
            <p><?php echo $current_user->user_email; ?></p>
          </td>
          <td>
            <a href="<?php echo get_the_permalink(648)?>" class="btn btn-primary">Edit Profile</a>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
<?php get_footer(); ?>