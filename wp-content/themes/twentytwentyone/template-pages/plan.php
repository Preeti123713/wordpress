<?php
/* Template Name: Plan */
get_header();
// print_r($_GET);
$timeperiod = $_GET['timeperiod'];
$purpose = $_GET['purpose'];
$selectdate = $_GET['selectdate'];
$count = 0;
$date = explode(",", $selectdate[0]);
$teachers = $_GET['teachers'];
$discount = ['1 Month 0% discount', '3 Month 5% discount', '6 Month 8% discount'];
$discountamt = [1, 0.95, 0.92];
$plans = ['Basic', 'Standard', 'Premium'];
$teacherdata = [];
?>
<div class="container">
    <form method="GET" action="<?php echo get_permalink(52) ?>">
        <input type="hidden" name="purposee[]" value="<?php echo $purpose[$count]; ?>">
        <?php foreach ($teachers as $teacher) { ?>
            <h5 class="text-center"><?php echo get_the_title($teacher); ?></h5>
            <?php
            $teacherdata[$teacher] = array($date[$count], $_GET['time_' . $count]);
            $count++;
            ?>
            <div class="container">
                <div class="card-group">
                    <?php foreach ($discount as $key => $value) { ?>
                        <div class="card card-item">
                            <div class="card-body">
                                <p class="card-text">
                                    <?php
                                    $plan = $plans[$key];
                                    echo $plan;
                                    ?>
                                    <input type="radio" name=<?php echo "pplan_" . $teacher; ?> id="plans" value="<?php echo $plan ?>" data-price="$<?php echo number_format(20 * $discountamt[$key], 2); ?>" class="dynamicRadio">
                                </p>
                                <p class="card-text"><?php echo $value ?></p>
                                <p class="card-text">Price $20</p>
                                <p class="card-text discountedprice">Discounted Price: $<?php echo number_format(20 * $discountamt[$key], 2); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <input type="hidden" id="<?php echo "hiddenPrice_". $teacher; ?>" name="<?php echo "price_" . $teacher; ?>" value="">
        <?php
        }
        ?>

        <input type="hidden" name="teacherdataa[]" value="<?php echo base64_encode(json_encode($teacherdata)); ?>">
        <input type="hidden" name="timeperiodd" value="<?php echo $timeperiod; ?>">
        <button type="submit" class="btn btn-success btn-sm">Select</button>
    </form>
</div>
<?php get_footer(); ?>