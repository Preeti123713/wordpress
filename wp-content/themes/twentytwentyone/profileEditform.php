<?php /* Template Name: UpdateProfileAdmin*/
get_header();
$user_id = get_current_user_id();
$user_detail = get_userdata($user_id);
$usermeta_data = get_user_meta($user_id, 'teacher_post_id');
$teacher_id = $usermeta_data[0];
$post_data = get_post($teacher_id);
$post_attachment = get_post_meta($teacher_id, 'post_attachment', true);
$teaching_experience = get_post_meta($teacher_id, 'teaching_experience', true);
$level = get_post_meta($teacher_id, 'level', true);
$language = get_post_meta($teacher_id, 'language', true);
$country = get_post_meta($teacher_id, 'country', true);
?>
<div class="vh-75 gradient-custom">
    <div class="container py-5  h-100">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body">
                        <h3 class="mb-4 pb-md-0 mb-md-3">Teacher Update Form</h3>
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
                            <div class="form-group col-md-12">
                                <label for="Teachingexp">Teaching Experience</label>
                                <select id="Teachingexp" class="form-control" name="teachingExperience">
                                    <option value="none" <?php echo $teaching_experience == 'none' ? 'selected' : ''; ?>>None</option>
                                    <option value="less than a year" <?php echo $teaching_experience == 'less than a year' ? 'selected' : ''; ?>>Less than a year</option>
                                    <option value="1 - 2 years" <?php echo $teaching_experience == '1 - 2 years' ? 'selected' : ''; ?>>1 - 2 years</option>
                                    <option value="2 - 4 years" <?php echo $teaching_experience == '2 - 4 years' ? 'selected' : '';  ?>>2 - 4 years</option>
                                    <option value="4 - 7 years" <?php echo $teaching_experience == '4 - 7 years years' ? 'selected' : '';  ?>>4 - 7 years</option>
                                    <option value="7 - 10 years" <?php echo $teaching_experience == '7 - 10 years years' ? 'selected' : '';  ?>>7 - 10 years</option>
                                    <option value="10+ years" <?php echo $teaching_experience == '10+ years' ? 'selected' : '';  ?>>10+ years</option>
                                </select>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputLevel">Level</label>
                                    <select id="inputLevel" class="form-control" name="level">
                                        <option selected>Choose level</option>
                                        <option value='beginner' <?php echo $level == 'beginner' ? 'selected' : ''; ?>>Beginner</option>
                                        <option value='intermediate' <?php echo $level == 'intermediate' ? 'selected' : ''; ?>>Intermediate</option>
                                        <option value='advanced' <?php echo $level == 'advanced' ? 'selected' : ''; ?>>Advanced</option>
                                        <option value='native' <?php echo $level == 'native' ? 'selected' : ''; ?>>Native</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputLanguage">Language</label>
                                    <select id="inputLanguage" class="form-control" name="language">
                                        <option selected>Choose Language</option>
                                        <option value='english' <?php echo $language == 'english' ? 'selected' : ''; ?>>English</option>
                                        <option value='german' <?php echo $language == 'german' ? 'selected' : ''; ?>>German</option>
                                        <option value='french' <?php echo $language == 'french' ? 'selected' : ''; ?>>French</option>
                                        <option value='mandarin' <?php echo $language == 'mandarin' ? 'selected' : ''; ?>>Mandarin</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCountry">Country</label>
                                    <select id="inputCountry" class="form-control" name="country">
                                        <option selected>Choose Country</option>
                                        <option value='india' <?php echo $country == 'india' ? 'selected' : ''; ?>>India</option>
                                        <option value='usa' <?php echo $country == 'usa' ? 'selected' : ''; ?>>USA</option>
                                        <option value='germany' <?php echo $country == 'germany' ? 'selected' : ''; ?>>Germany</option>
                                        <option value='singapore' <?php echo $country == 'singapore' ? 'selected' : ''; ?>>Singapore</option>
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
                                <?php
                                foreach ($post_attachment as $keys => $imageids) {
                                    $image = wp_get_attachment_image_url($imageids); ?>
                                    <div class="card">
                                        <img class="card-img-top" src="<?php echo $image ?>" alt="Teacher_qualifications" height="300px" data-id="<?php echo $imageids; ?>">
                                        <a href="javascript:void(0);" class="remove btn btn-danger">remove</a>
                                        <input type="hidden" name="image[]" id="imageid_<?php echo $keys; ?>" value="<?php echo $imageids; ?>">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group right-inner-addon col-md-9" id="count_1">
                                <div class="form-group">
                                    <label for="images">Images</label>
                                    <span class="add input-group-addon"><i class="fa-solid fa-plus"></i></span>
                                    <span class="remove input-group-addon-minus"><i class="fa-solid fa-xmark"></i></span>
                                    <input type="file" name="qualifications[]" id="qualification_1" class="form-control">
                                </div>
                                <div id="image_preview" style="width:100%;"></div>
                            </div>
                            <a href="<?php echo get_the_permalink(698); ?>">Forget Password</a>
                            <input type="hidden" name="removeId[]" id="remove_id">
                            <input type="hidden" name="action" value="updateTeachers">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>