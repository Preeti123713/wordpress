<?php
/* Template Name: Listing */
get_header();
$selectedLevel = $_GET['level-select'];
$selectedCountry = $_GET['country-select'];
$selectedLanguage = $_GET['language-select'];
$arguments = array(
    'post_type' => 'teacher',
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => 'country',
            'value' => $selectedCountry,
            'compare' => 'LIKE',
        ),
        array(
            'key' => 'level',
            'value' => $selectedLevel,
            'compare' => 'LIKE',
        ),
        array(
            'key' => 'language',
            'value' => $selectedLanguage,
            'compare' => 'LIKE',
        ),
    ),
);
$the_main_loop = new WP_Query($arguments);
if ($the_main_loop->have_posts()) {
    while ($the_main_loop->have_posts()) {
        $the_main_loop->the_post();
        $arr[] = get_the_ID();
    }
}
?>
<form method="GET" id="teacherlisting" action='<?php echo get_permalink(30); ?>'>
    <div class="container">
        <div class="row">
            <?php
            $result = custom_sort($arr);
            // print_r($result);
            foreach ($result as $res) {
            ?>
                <div class="col-md-4">
                    <!-- Your card HTML goes here -->
                    <div class="card">
                    <a href='<?php echo get_the_permalink(805) . "?data=" . base64_encode($res);?>'>
                                <img class="card-img-top" src="https://png.pngtree.com/png-vector/20191110/ourmid/pngtree-avatar-icon-profile-icon-member-login-vector-isolated-png-image_1978396.jpg" alt="Card image cap" style="height:150px; width:150px" data-id="<?php echo $res; ?>">
                            </a>
                        <div class="card-body">
                            <input type="checkbox" class="form-check-input" id="teacher_id" name="teachers[]" value="<?php echo $res; ?>">
                            <h5 class="card-title"><?php echo get_the_title($res); ?></h5>
                            <p class="card-text">Level : <?php echo  get_post_meta($res, 'level', true); ?></p>
                            <p class="card-text">Country : <?php echo  get_post_meta($res, 'country', true); ?></p>
                            <p class="card-text">Language : <?php echo get_post_meta($res, 'language', true); ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="card-footer text-center">
            <a href="javascript:void" class="btn btn-success btn-sm" id="center">Next</a>
        </div>
    </div>
</form>
<?php get_footer(); ?>