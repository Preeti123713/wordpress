<?php
/*Template Name:Stdentpayment */
get_header('student');
$user_id = get_current_user_id();
$sql = "SELECT id,totalamount FROM payment WHERE user_id = $user_id";
$Payments = $wpdb->get_results($sql);
?>
<div class="container">
    <div id="accordion">
        <?php foreach ($Payments as $key => $payment) {
            $payment_id = $payment->id;
            $sql2 = "SELECT * FROM `booking` WHERE payment_id = $payment_id";
            $bookings = $wpdb->get_results($sql2);
        ?>
            <div class="card" >
                <div class="card-header custom-header">
                    <a class="card-link" data-toggle="collapse" href="#description<?php echo $payment_id; ?>">
                        Total Amount :   <?php echo $payment->totalamount; ?>
                    </a>
                </div>
                <div id="description<?php echo $payment_id; ?>" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <?php foreach ($bookings as $book){ ?>
                            <ul>
                                <li>
                                    <p>Teacher Name : <?php echo get_the_title($book->id) ?>
                                    </p></li>
                                <li><p>Plan : <?php echo $book->plans; ?></p></li>
                                <li><p>Plan Price : $<?php echo $book->plan_price; ?></p></li>
                                <?php $timestamp = $book->booking_date_time;
                                $date = date('d/m/Y', $timestamp);
                                $time = date('H:i:s', $timestamp);
                                $new_time = date('h:i:s a', strtotime($time));
                                ?>
                                <li><p>
                                    Date : <?php echo $date; 
                                            ?></p>
                                </li>
                                <li><p>
                                    Time : <?php echo $new_time; ?></p>
                                </li>
                            </ul>
                            <hr>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php get_footer('student'); ?>