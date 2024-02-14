<?php
/*Template Name:Stdentpayment */
get_header('student');
$user_id = get_current_user_id();
$sql = "SELECT Booking.plans,Booking.teacherid,Booking.plan_price,Booking.payment_id,payment.user_id,payment.payment_date_time,payment.totalamount 
FROM booking 
INNER JOIN payment ON booking.payment_id = payment.id
WHERE payment.user_id = 50;";
$bookings = $wpdb->get_results($sql);
// echo "<pre>";
// print_r($bookings);
// Function to group array by payment_id
// Group the array by payment_id
$groupedArray = [];
foreach ($bookings as $item) {
    $paymentId = $item->payment_id;
    if (!isset($groupedArray[$paymentId])) {
        $groupedArray[$paymentId] = [];
    }
    $groupedArray[$paymentId][] = $item;
}
echo "<pre>";
// Output the grouped array
// print_r($groupedArray);
?>
<div class="container">
        <div id="accordion">
            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                        Collapsible Group Item #1
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        <ul>
                            <li>Coffee</li>
                            <li>Tea</li>
                            <li>Milk</li>
                        </ul>

                        <ul>
                            <li>Audi</li>
                            <li>BMW</li>
                            <li>Mercedes</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        Collapsible Group Item #2
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Collapsible Group Item #3
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer('student'); ?>