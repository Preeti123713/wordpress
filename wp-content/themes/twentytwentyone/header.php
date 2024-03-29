<!DOCTYPE html>
<html lang='en' dir='ltr'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title> Website Layout |TeachingPlatform</title>
  <?php wp_head(); ?>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">TeachingPlatform</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo get_the_permalink(59); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item" style="white-space: nowrap;">
          <a class="nav-link" href="<?php echo get_the_permalink(81); ?>">To Become Teacher</a>
        </li>
        <?php if (!is_user_logged_in()) {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php  echo get_the_permalink(843);?>">Register</a>
        </li>
        <?php } ?>
        <?php if (current_user_can('student')) {
        ?> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo get_the_permalink(706); ?>">Profile</a>
          </li>
        <?php  } elseif (current_user_can('teacher')) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo get_the_permalink(399);
                                      ?>">Profile</a>
          </li>
        <?php }
        ?>
        <?php if (is_user_logged_in()) {
        ?>
          <li class="nav-item" style="transform:translateY(-100%);">
            <a class="nav-link " href="<?php echo get_the_permalink(570); ?>">Login</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo get_the_permalink(570); ?>">Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>