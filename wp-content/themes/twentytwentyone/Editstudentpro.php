<?php /* Template Name: UpdateStudent Profile*/
get_header('student');
get_header('student');
$current_user = wp_get_current_user();
?>
<div class="vh-75 light-blue">
    <div class="container py-5  h-100">
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body">
                        <h3 class="mb-4 pb-md-0 mb-md-3">Student Profile Update Form</h3>
                        <form id="Teacher-update" method="post">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Name</label>
                                    <input type="text" class="form-control" id="inputName" name="name" value="<?php echo $current_user->user_login; ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name">Username</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $current_user->display_name; ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $current_user->user_email; ?>">
                                </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer('student'); ?>