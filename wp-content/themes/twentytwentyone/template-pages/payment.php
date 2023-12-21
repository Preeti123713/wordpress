<?php
/* Template Name: payment */
print_r($_GET);
$teachers = $_GET['teachers'];
$discount = ['1 Month 0% discount', '3 Month 5% discount', '6 Month 8% discount'];
$discountamt = [1, 0.95, 0.92];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
          crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>
</html>