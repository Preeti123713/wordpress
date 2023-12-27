<?php
/* Template Name: payment */
get_header();
// print_r($_GET);
$teachers = $_GET['teachers'];
$discount = ['1 Month 0% discount','3 Month 5% discount','6 Month 8% discount'];
$discountamt = [1, 0.95, 0.92];
?>
<div class="container">
    <form method="GET" action="<?php echo get_permalink(58)?>">
    <?php foreach ($teachers as $teacher) { ?>
        <h5 class="text-center"><?php echo get_the_title($teacher); ?></h5>
        <div class="container">
            <div class="card-group">
                <?php foreach ($discount as $key => $value) { ?>
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><?php echo $value; ?></p>
                            <p class="card-text">Price $10</p>
                            <p class="card-text">Discounted Price: $<?php echo number_format(10 * $discountamt[$key], 2); ?></p>
                        </div>
                        <button class="btn btn-success btn-sm" id="center">Select</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    </form>
</div>
<?php get_footer(); ?>