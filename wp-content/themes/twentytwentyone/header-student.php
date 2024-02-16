<?php  date_default_timezone_set('Asia/Kolkata'); ?>
<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title> Student Dashboard</title>
  <?php wp_head(); ?>
</head>
<body>
    <div class="student-container">
    <div class="sidebar-stud">
        <div class="logo">
            <ul class="menu">
                <li class="active">
                    <a href="#"><i class="fa-solid fa-gauge-simple-high"></i><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="<?php echo get_the_permalink(706);?>"><i class="fa-solid fa-user"></i><span>Profile</span></a>
                </li>
                <li>
                    <a href="<?php echo get_the_permalink(766);?>"><i class="fa-solid fa-money-bill"></i><span>Payment Info</span></a>
                </li>
                <li>
                    <a href="<?php echo get_the_permalink(712) ?>"><i class="fas fa-chalkboard-teacher"></i><span>MyBooking</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>
                    Primary
                </span>
                <h2>Dashboard</h2>
            </div>
            <div class="user-info">
                <div class="search--box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="search">
                    <img src='<?php echo get_template_directory_uri()."/assets/images/girl.jpg"?>' alt="">
                </div>
            </div>
        </div>