<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Music Website</title>
 <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="navbar">
            <a class="navbar-brand" href="#">myTunes</a>
            <?php wp_nav_menu(array('theme_location'=>'primary','container'=>''))?>
            <!-- <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Music</a>
                </li>
                <li>
                    <a href="#">Video</a>
                </li>
                <li>
                    <a href="#">Gift</a>
                </li>
            </ul> -->
        </div>
    </header>