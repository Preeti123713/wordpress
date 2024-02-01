<?php
/*Template Name: forget_password*/
get_header();
?>
<div class="vh-75 gradient-custom">
    <div class="container py-5  h-100">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body">
                        <h3 class="mb-4 pb-md-0 mb-md-3">Forget Password </h3>
                        <form id="forgetpassword" method="post">
                                <div class="form-group col-md-12">
                                    <label for="pwd">Password</label>
                                    <input type="password" id="pwd" name="pwd" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="pwd">New Password</label>
                                    <input type="password" id="newpwd" name="newpassword" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="confirmpwd">Confirm Password</label>
                                    <input type="password" id="confirmpwd" name="confirmpassword" class="form-control">
                                </div>
                            <input type="hidden" name="action" value="ForgetPassword">
                            <button type="submit" class="btn btn-primary">Forget</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>