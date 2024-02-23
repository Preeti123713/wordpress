<?php
/*Template Name:Stdentpayment */
get_header('student');
$user_id = get_current_user_id();
$sql = "SELECT id,totalamount,payment_date_time FROM payment WHERE user_id = $user_id Order By id Desc";
$Payments = $wpdb->get_results($sql);
?>
<div class="container">
    <div id="accordion">
        <?php foreach ($Payments as $key => $payment) {
            $payment_id = $payment->id;
            // $sql2 = "SELECT * FROM `booking` WHERE payment_id = $payment_id";
         $testsql = "SELECT booking.*, payment.payment_date_time FROM booking INNER JOIN payment ON booking.payment_id = payment.id WHERE booking.payment_id = $payment_id";
            $bookings = $wpdb->get_results($testsql);
            ?>
            <div class="card">
                <div class="card-header custom-header">
                    <a class="card-link" data-toggle="collapse" href="#description<?php echo $payment_id; ?>">
                        Total Amount : <?php echo $payment->totalamount; ?>
                    </a>
                </div>
                <div id="description<?php echo $payment_id; ?>" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Teacher Name</th>
                                    <th scope="col">Plans</th>
                                    <th scope="col">Each Price</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bookings as $book) {
                                    $timestamp = $book->payment_date_time;
                                    $date = date('d/m/Y',$timestamp);
                                    $time = date("h:i:s A" ,$timestamp);
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo get_the_title($book->teacherid); ?></th>
                                        <td><?php echo $book->plans; ?></td>
                                        <td><?php echo $book->plan_price; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $time; ?></td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                  
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php get_footer('student'); ?>