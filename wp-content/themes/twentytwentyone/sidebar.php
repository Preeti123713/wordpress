<!-- sidebar.php -->
<div class="container-fluid" id="main">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-md-3 col-lg-2 sidebar-offcanvas bg-light" id="sidebar" role="navigation">
            <ul class="nav flex-column ">
                <li class="nav-item text-primary"><a class="nav-link" id="dashboard" href="#"> Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" id="profile" href="<?php echo get_the_permalink(399);?>">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo get_the_permalink(397)?>">Bookings</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo get_the_permalink(402)?>">MyStudent</a></li>
            </ul>
        </div>