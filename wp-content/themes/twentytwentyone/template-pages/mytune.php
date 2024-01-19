<?php
/* Template Name: MyTunes*/
global $post;
get_header('custom'); // Load the custom header for the home page
?>
<section class="hero-section" id="hero" style="background-image: url('<?php echo get_field('banner_image',$post->ID); ?>')">
    <div class="conatiner">
        <h1><?php
      echo get_field('banner_heading',$post->ID); ?></h1>
        <h3><?php
      echo get_field('banner_sub_heading',$post->ID); ?></h3>
        <p><?php
      echo get_field('banner_description',$post->ID); ?></p>
    </div>
</section>

<section class="music-section" id="music">
    <div class="container">
        <h2>
            <span><i class="fa fa-music"></i></span>
            <?php
      echo get_field('music_heading',$post->ID); ?>
        </h2>
        <h4> <?php
      echo get_field('music_sub_heading',$post->ID); ?></h4>
        <p><?php
      echo get_field('music_description',$post->ID); ?></p>

        <button class="primary-btn">
        <?php
      echo get_field('music_button_text',$post->ID); ?>
        </button>
        
        <p><?php
      echo get_field('music_text',$post->ID); ?> </p>
        <div class="ipad-iphone-img"> 
            <img src="<?php echo get_field('music_image',$post->ID); ?>" alt="Ipad Iphone">
        </div>
    </div>
</section>

<section class="movie-collection">
    <div class="container">
        <h2><?php
      echo get_field('movie_heading',$post->ID); ?></h2>

        <p><?php
      echo get_field('movie_description',$post->ID); ?></p>

        <button class="secondary-btn"><?php
      echo get_field('movie_button_text',$post->ID); ?></button>

        <div class="mac-book-img"> 
            <img src="<?php
      echo get_field('movie_image',$post->ID); ?>" alt="Mac">
        </div>
    </div>
</section>

<section class="entertainment" style="background-image: url('<?php get_field('entertainment_banner_image',$post->ID); ?>');">
    <div class="container">
        <h2><?php
      echo get_field('entertainment_heading',$post->ID); ?></h2> 
        <p><?php
      echo get_field('entertainment_description',$post->ID); ?></p>
    </div>
</section>

<section class="gift-card">
    <div class="container">
        <div class="gift-card-img"> 
            <img src="<?php echo get_field('
gift_card_image',$post->ID); ?>" alt="Gift card">
        </div>
        <div class="gift-card-content">
            <h2><?php
      echo get_field('gift_card_heading',$post->ID); ?></h2>
            <p><?php
      echo get_field('gift_card_description',$post->ID); ?></p>

            <p><?php
      echo get_field('gift_card_button_text',$post->ID); ?></p>
            <div class="line"></div>
            <button class="secondary-btn"><?php
      echo get_field('gift_card_button_text',$post->ID); ?></button>
        </div>
    </div>
</section>
<?php get_footer('custom'); ?>