<?php /* Template Name: UpdateProfileAdmin*/
get_header();
$user_id = get_current_user_id();
$user_detail = get_userdata($user_id);
$usermeta_data = get_user_meta($user_id, 'teacher_post_id');
$teacher_id = $usermeta_data[0];
$post_data = get_post($teacher_id);
$teacher_postmeta = get_post_meta($teacher_id);
$serialize_data = $teacher_postmeta['post_attachment'];
$unserialize_data = unserialize($serialize_data[0]);
$imageid = [];
?>
<div class="vh-75 gradient-custom">
    <div class="container py-5  h-100">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body">
                        <h3 class="mb-4 pb-md-0 mb-md-3"> Teacher Registration Form</h3>
                        <form id="Teacher-update" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">Name</label>
                                    <input type="text" class="form-control" id="inputName" name="name" value="<?php echo $user_detail->display_name; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo $user_detail->user_email; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- <div class="form-group col-md-6">
                                    <label for="pwd">Password</label>
                                    <input type="password" id="pwd" name="pwd" class="form-control">
                                </div> -->
                                    <div class="form-group col-md-12">
                                    <label for="Teachingexp">Teaching Experience</label>
                                    <select id="Teachingexp" class="form-control" name="teachingExperience">
                                        <option value="none" <?php echo ($teacher_postmeta['teaching_experience'][0] == 'none') ? 'selected' : ''; ?>>None</option>
                                        <option value="less than a year" <?php echo ($teacher_postmeta['teaching_experience'][0] == 'less than a year') ? 'selected' : ''; ?>>Less than a year</option>
                                        <option value="1 - 2 years" <?php echo ($teacher_postmeta['teaching_experience'][0] == '1 - 2 years') ? 'selected' : ''; ?>>1 - 2 years</option>
                                        <option value="2 - 4 years" <?php echo ($teacher_postmeta['teaching_experience'][0] == '2 - 4 years') ? 'selected' : '';  ?>>2 - 4 years</option>
                                        <option value="4 - 7 years" <?php echo ($teacher_postmeta['teaching_experience'][0] == '4 - 7 years years') ? 'selected' : '';  ?>>4 - 7 years</option>
                                        <option value="7 - 10 years" <?php echo ($teacher_postmeta['teaching_experience'][0] == '7 - 10 years years') ? 'selected' : '';  ?>>7 - 10 years</option>
                                        <option value="10+ years" <?php echo ($teacher_postmeta['teaching_experience'][0] == '10+ years') ? 'selected' : '';  ?>>10+ years</option>
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputLevel">Level</label>
                                    <select id="inputLevel" class="form-control" name="level">
                                        <option selected>Choose level</option>
                                        <option value='beginner' <?php echo ($teacher_postmeta['level'][0] == 'beginner') ? 'selected' : ''; ?>>Beginner</option>
                                        <option value='intermediate' <?php echo ($teacher_postmeta['level'][0] == 'intermediate') ? 'selected' : ''; ?>>Intermediate</option>
                                        <option value='advanced' <?php echo ($teacher_postmeta['level'][0] == 'advanced') ? 'selected' : ''; ?>>Advanced</option>
                                        <option value='native' <?php echo ($teacher_postmeta['level'][0] == 'native') ? 'selected' : ''; ?>>Native</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputLanguage">Language</label>
                                    <select id="inputLanguage" class="form-control" name="language">
                                        <option selected>Choose Language</option>
                                        <option value='english' <?php echo ($teacher_postmeta['language'][0] == 'english') ? 'selected' : ''; ?>>English</option>
                                        <option value='german' <?php echo ($teacher_postmeta['language'][0] == 'german') ? 'selected' : ''; ?>>German</option>
                                        <option value='french' <?php echo ($teacher_postmeta['language'][0] == 'french') ? 'selected' : ''; ?>>French</option>
                                        <option value='mandarin' <?php echo ($teacher_postmeta['language'][0] == 'mandarin') ? 'selected' : ''; ?>>Mandarin</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCountry">Country</label>
                                    <select id="inputCountry" class="form-control" name="country">
                                        <option selected>Choose Country</option>
                                        <option value='india' <?php echo ($teacher_postmeta['country'][0] == 'india') ? 'selected' : ''; ?>>India</option>
                                        <option value='usa' <?php echo ($teacher_postmeta['country'][0] == 'usa') ? 'selected' : ''; ?>>USA</option>
                                        <option value='germany' <?php echo ($teacher_postmeta['country'][0] == 'germany') ? 'selected' : ''; ?>>Germany</option>
                                        <option value='singapore' <?php echo ($teacher_postmeta['country'][0] == 'singapore') ? 'selected' : ''; ?>>Singapore</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-9">
                                <div class="form-group">
                                    <label for="self-description">Self Description</label>
                                    <textarea class="form-control" id="self-description" rows="3" name="selfDescription"><?php echo $post_data->post_content; ?></textarea>
                                </div>
                            </div>
                             <div class="card-group">
                                <?php foreach ($unserialize_data as $key => $attachment_id) {
                                 $imageid[$key] = $attachment_id;
                                 $image = wp_get_attachment_image_url($attachment_id); 
                                ?>
                                    <div class="card">
                                        <img class="card-img-top" src="<?php  echo $image ?>" alt="Teacher_qualifications" height="300px" data-id="<?php echo $imageid[$key];?>">
                                        <a href="#" class="remove btn btn-danger">remove</a>
                                    </div>
                                    <input type="hidden" name="image[]" id="imageid" value="<?php echo $imageid[$key]; ?>">
                                    <?php 
                                    } 
                                    ?>
                                </div> 
                                
                            <div class="form-group right-inner-addon col-md-9" id="count_1">
                                <div class="form-group">
                                    <label for="images">Images</label>
                                    <input type="file" name="qualifications[]" id="qualification_1" multiple class="form-control" required>
                                </div>
                                <div id="image_preview" style="width:100%;"></div>
                                </div>
                            <input type="hidden" name="action" value="UpdateTeachers">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php get_footer();
?>