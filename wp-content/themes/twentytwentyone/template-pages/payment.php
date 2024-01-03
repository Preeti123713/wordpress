<?php
/* Template Name: Payment */
get_header();
$result = json_decode(base64_decode($_GET['teacherdataa'][0]));
// print_r($result);
?>
<div class="container">
	<?php
	if (is_user_logged_in()) {
		//      User is logged in
		echo 'Welcome, registered user!'; ?>
	<?php } else { ?>
		<div>
			<button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				Login Form
			</button>
		</div>
	<?php  } ?>
	<div class="collapse" id="collapseExample">
		<div class="card card-body">
			<nav class="nav nav-tabs nav-justified">
				<a class="nav-item nav-link active" data-toggle="tab" href="#login">Login</a>
				<a class="nav-item nav-link" data-toggle="tab" href="#register">Register</a>
			</nav>
			<div id="registration-message" style="display: none;"></div>
			<div class="tab-content">
				<div id="login" class="tab-pane fade show active">
					<h3>Login</h3>
					<form id="login" method="post">
						<div class="form-group">
							<label for="login_email">email</label>
							<input type="email" class="form-control" id="login_email" name="l_email">
						</div>
						<div class="form-group">
							<label for="login_password">Password</label>
							<input type="password" class="form-control" id="login_password" name="l_password">
						</div>
						<button type="submit" class="btn btn-primary btn-block">Login</button>
					</form>
				</div>
				<div id="register" class="tab-pane fade">
					<h3>Register</h3>
					<form id="register-form" method="post">
						<div class="form-group">
							<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address">
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container my-5">
	<div class="details">
		<?php foreach ($result as $res => $value) { ?>
			<h4>Teacher`s Name: <?php echo get_the_title($res) ?> </h4>
			<p>Selected Plan: <?php echo $_GET['pplan_' . $res]; ?></p>
			<p>Total Amount: <?php echo $_GET['price_' . $res] ?></p>
		<?php } ?>
	</div>
	<div class="billing" id="billing-form">

		<h2 class=""></h2>
		<form id="payment-form" method="post">
			<div class="form-group">
				<label for="name">Name</label>
				<div class="input-group">
					<input type="text" id="name" class="form-control" name="name" placeholder="Enter The name" autocomplete="name" required autofocus />
				</div>
			</div>
			<div class="form-group">
				<label for="amount">Amount</label>
				<input type="number" class="form-control" id="amount" name="amount" placeholder="Enter The Amount" autocomplete="number" required />
			</div>
			<div class="form-group">
				<label for="card-element">
					Credit or debit card
				</label>
				<div id="card-element">
					<!-- A Stripe Element will be inserted here. -->
				</div>
				<div id="card-errors" role="alert"></div>
			</div>


			<input type="submit" value="Submit" class="btn btn-primary" id="payment">
		</form>
	</div>
</div>
<?php wp_footer(); ?>