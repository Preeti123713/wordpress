<?php /* Template Name: CommonLogin*/
get_header();
?>
<div class="vh-100 gradient-custom">
  <div class="container py-5  h-100">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body my-5">
            <h3 class="text-center">Login</h3>
            <form id="ajax-login-form" method="post" role="form" autocomplete="off">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email" value="" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 text-center my-4">
                    <input type="hidden" name="action" value="commonLogin">
                    <input type="submit" name="login-submit" id="login-submit" class="form-control btn btn-success" value="Log In">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>