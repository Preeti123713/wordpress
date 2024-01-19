<?php
/* Template Name: GreatZone */
// global $post;

get_header('zone');
$current = CFS()->get('get_current');
?>
<main>
    <section class="make-zone-better">
        <div class="zone-better-content">
            <h1><?php echo CFS()->get('zone_better_content'); ?></h1>
            <h4><?php echo CFS()->get('zone_better_content_sub_heading'); ?></h4>
        </div>
        <div class="zone-better-img">
        <img src='<?php echo CFS()->get('zone-better-img');?>' alt="zone better image">
    </div>
    </section>
    
    </section>

    <section class="long-established">
        <div class="estb-content">
            <h2><?php echo CFS()->get('long_established_title'); ?></h2>
            <p><?php echo CFS()->get('long_established_content'); ?></p>
            <div class="estb-meta">
                <span class="estb-date"><?php echo CFS()->get('long_established_date', $post->ID)
                                        ?></span>
                <span class="read-more"><?php echo CFS()->get('long_established_text', $post->ID)
                                        ?></span>
            </div>
        </div>
        <div class="estb-img">
            <img src='<?php echo CFS()->get('long_established_image');
                        ?>' alt="established">
        </div>
    </section>

    <section class="blogs-section">
        <?php
        $loop = CFS()->get('blog_card');
        foreach ($loop as $row) {  ?>
            <div class="blog-card">
                <img src='<?php echo $row['blog_card_image'];
                            ?>' alt="">
                <div class="blog-inner-content">
                    <h2><?php echo $row['blog_inner_title'];
                        ?></h2>
                    <p><?php echo $row['blog_inner_content'];
                        ?></p>
                    <div class="estb-meta">
                        <span class="estb-date"><?php echo $row['blog_meta_date'];
                                                ?></span>
                        <span class="read-more"><?php echo $row['blog_meta_text'];
                                                ?></span>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
<section class="about-us">
        <div class="about-content">
            <h1><?php echo CFS()->get('about_title') 
                ?></h1>
            <p><?php echo CFS()->get('about_content')
                ?></p>
            <div class="estb-meta">
                <span class="estb-date"><?php echo CFS()->get('about_meta_date')
                                        ?></span>
                <span class="read-more"><?php echo CFS()->get('about_meta_text')
                                        ?></span>
            </div>
        </div>
        <div class="about-img">

            <img src='<?php echo CFS()->get('about_meta_image')
                        ?>' alt="about image">
            <div class="see-more-btn">
                <button>
                    <?php echo CFS()->get('see_more_btn_text'); 
                    ?>
                    <img src='<?php echo CFS()->get('see_more_button_image'); ?>' alt="">
                </button>
            </div>
        </div>
    </section>
</main>
<?php get_footer('zone'); ?>