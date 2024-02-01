<?php
/* Template Name: Student-profile*/
get_header('student');
$current_user = wp_get_current_user();

?>
<div class="booking mb-4">
  <div class="booking-inner">
    <div class="col-md-9">
      <header class="booking-header">
        <div class="title"> Student Profile</div>
      </header>
      <table class="booking-table">
        <thead>
          <tr>
            <th>Student`s Name</th>
            <th>Student`s Username</th>
            <th>Student`s Email</th>
            <th>Edit Profile</th>
          </tr>
        </thead>
        <tr>
          <td>
            <p><?php echo $current_user->user_login; ?></p>
          </td>
          <td>
            <p><?php echo $current_user->display_name;  ?></p>
          </td>
          
          <td>
              <p><?php echo $current_user->user_email; ?></p>
            </td>
          <td>
            <a href="<?php echo get_the_permalink(710);?>" class="btn btn-primary">Edit Profile</a>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
<?php get_footer('student'); ?>