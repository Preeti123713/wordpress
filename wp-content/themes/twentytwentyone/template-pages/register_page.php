<?php /*Template Name:  Register page */
get_header();
?>
<div class="vh-100 gradient-custom">
    <div class="container py-5  h-100">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body my-5">
                        <h3>Register</h3>
                        <form id="register-form" method="post">
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="action" value="register_user">
                                <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
?>