<?php
/* Template Name: PasswordTemplate*/
get_header();
?>
<div class="container-fluid Template">
    <div class="row">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top " src="<?php echo get_template_directory_uri() . '/assets/images/download.png' ?>" alt="Card image cap">
        <div class="card-body text-center">
            <h5 class="card-title text-center">Password Changed !</h5>
            <p class="card-text text-center">Your password has been change successfully.</p>
            <a href="#" class="btn btn-primary">Back to Login</a>
        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>