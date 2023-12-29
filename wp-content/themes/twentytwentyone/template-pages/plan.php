<?php
/* Template Name: Plan */
get_header();
// print_r($_GET);
$count = 0; // Initialize count variable
// $time_0 = $_GET['time_0'];
// $time_1 = $_GET['time_1'];
// $time_2 = $_GET['time_2'];
$selectdate = $_GET['selectdate'];

$result = explode(",", $selectdate[0]);

// Concatenating date and time strings

// print_r($result);
$teachers = $_GET['teachers'];
$discount = ['1 Month 0% discount', '3 Month 5% discount', '6 Month 8% discount'];
$discountamt = [1, 0.95, 0.92];
$plans = ['Basic', 'Standard', 'Premium'];
?>
<div class="container">
    <form method="GET" action="<?php echo get_permalink(52) ?>">
        <input type="hidden" name="timeperiod" value="<?php echo $timeperiod ?>">
        <input type="hidden" name="time_0" value="<?php echo $time_0 ?>">
        <input type="hidden" name="time_1" value="<?php echo $time_1 ?>">
        <input type="hidden" name="time_2" value="<?php echo $time_2 ?>">
        <?php foreach ($teachers as $teacher) { ?>
            <input type="hidden" name="teacher[]" value="<?php echo $teacher ?>">
            <h5 class="text-center"><?php echo get_the_title($teacher); ?></h5>
            <?php
            foreach ($result as &$value) {
                $value .= $_GET['$time_.$count']; // Concatenate $value with $time and $count
                $count++; // Increment count
            } 
            print_r($result)?>
            <div class="container">
                <div class="card-group">
                    <?php foreach ($discount as $key => $value) { ?>
                        <div class="card card-item">
                            <div class="card-body">
                                <p class="card-text"><?php echo $plan = $plans[$key]; ?><input type="radio" name=<?php echo  "plan_" . $teacher; ?> id="plans" value="<?php echo $plan ?>" data-price="$20"></p>
                                <p class="card-text"><?php echo $value ?></p>
                                <p class="card-text">Price $20</p>
                                <p class="card-text">Discounted Price: $<?php echo number_format(20 * $discountamt[$key], 2); ?></p>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-success btn-sm" id="plan">Select</button>
    </form>
</div>
<?php get_footer(); ?>