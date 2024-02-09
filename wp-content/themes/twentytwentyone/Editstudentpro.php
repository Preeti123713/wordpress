<?php /* Template Name: UpdateStudent Profile*/
get_header('student');
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
$default_img_id = 727;
$student_description = get_user_meta($user_id, 'student_description');
$student_image_id = get_user_meta($user_id, 'user_profile_image');
    // User profile image is not empty
    $url = wp_get_attachment_image_url($student_image_id[0]);
?>
<div class="vh-75 light-blue">
    <div class="container py-5  h-100">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body">
                        <h3 class="mb-4 pb-md-0 mb-md-3">Student Profile Update Form</h3>
                        <form id="update" method="post" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" name="name" value="<?php echo $current_user->user_login; ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $current_user->user_email; ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="user-description">Bio</label>
                                <textarea class="form-control" id="user-description" name="bio" rows="3"><?php echo $student_description[0]; ?></textarea>
                            </div>
                            <?php if(!empty($url)){?>
                            <div class="previous-image">
                                <img src='<?php echo $url; ?>' class="card-img-top profile-image" alt="profile_image">
                                <div class="edit"><a href="javascript:void(0)"><i class="fa-solid fa-trash"></i></a></div>
                                <input type="hidden" name="image" id="imageid" value="<?php echo $student_image_id[0]; ?>">
                            </div>
                           <?php }else{?> 
                            <div class="previous-image" style="display: none;">
                                <img src='<?php echo $url; ?>' class="card-img-top profile-image" alt="profile_image">
                                <div class="edit"><a href="javascript:void(0)"><i class="fa-solid fa-trash"></i></a></div>
                                <input type="hidden" name="image" id="imageid" value="<?php echo $student_image_id[0]; ?>">
                            </div>
                         <?php }?>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="user-img">Profile Image</label>
                        <input type="file" class="form-control-file" id="user-img" name="profile-img">
                        <div id="image-preview"></div>
                    </div>
                    <input type="hidden" name="image_id" value="<?php echo $student_image_id[0];  ?>">
                    <input type="hidden" name="action" value="updateStudent">
                    <a href="<?php echo get_the_permalink(698); ?>">Forget Password</a>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php get_footer('student'); ?>