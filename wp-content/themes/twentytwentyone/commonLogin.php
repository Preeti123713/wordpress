<?php /* Template Name: CommonLogin*/
get_header();
?>
<div class="col-lg-12">
              <div class="text-center">
                <h3><b>Log In</b></h3>
              </div>
              <form id="ajax-login-form" method="post" role="form" autocomplete="off">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="email" value="" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" autocomplete="off">
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-5 pull-right">
                    <input type="hidden" name="action" value="commonLogin">
                      <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Log In">
                    </div>
                  </div>
                </div>
              </form>
            </div>
<?php get_footer();?>