<?php
/* Template Name: viewProfile */
get_header('admin');
$data = $_GET['data'];
$Teacher_id = base64_decode($data);
echo $Teacher_id;
// Custom SQL query
$sql = "SELECT * FROM `wp_usermeta` WHERE `meta_key`='teacher_post_id' AND `meta_value` = $Teacher_id";
// Execute the query
$results = $wpdb->get_results($sql);
$searUserid = $results[0]->user_id;
$user = get_user_by('ID', $searUserid);
$level = get_post_meta($Teacher_id, 'level', true);
$language = get_post_meta($Teacher_id, 'language', true);
$country = get_post_meta($Teacher_id, 'country', true);
$teacher_exp =  get_post_meta($Teacher_id, 'teaching_experience', true);
$Teacher_content = get_post_field('post_content', $Teacher_id);
$attachment_id = get_post_meta($Teacher_id, 'post_attachment', true);
$email = $user->user_email;
// print_r($attachment_id);
$image_url = wp_get_attachment_url($attachment_id[0]);
$post = get_post($Teacher_id);
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
                                <p class="text-muted mb-0"><?php echo $post->post_title; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Teacher Bio</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $Teacher_content; ?></p>
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
                                <p class="text-muted mb-0"><?php echo $email; ?></p>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>