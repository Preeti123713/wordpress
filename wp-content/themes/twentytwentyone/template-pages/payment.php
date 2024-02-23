<?php
/* Template Name: Payment */
get_header();
$purpose = ($_GET['purposee']);
$timeperiod = $_GET['timeperiodd'];
$pplan = [];
$result = json_decode(base64_decode($_GET['teacherdataa'][0]));
$total_amount = 0;
$user_id = get_current_user_id();
$user = get_userdata($user_id);
?>
<div class="container mt-4">
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
					<form id="register-form123" method="post">
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
			<?php $pplan[$res] = $_GET['pplan_' . $res];   ?>
			<p>Selected Plan: <?php echo $_GET['pplan_' . $res];  ?></p>
			<p> Each Price : <?php echo $price = $_GET['price_' . $res]; ?></p>
			<?php
			$pricevalue = $price = substr($price, 1); // Extract characters after the dollar sign;
			$total_amount += $pricevalue;
			?>
		<?php } ?>
	</div>
	<?php
	$myArray = json_decode(json_encode($result), true);
	$resultNew = [];

	foreach ($myArray as $key => $value) {
		$resultNew[$key] = array($pplan[$key], $value[0], $value[1], $pricevalue);
	}
	$newteacherdata = array($resultNew, $timeperiod, $purpose);
	if(is_user_logged_in()){
	$user_login ? isset($user->user_login): ' ';
	$user_email ? isset($user->user_email): ' ';
	}
	?>
	<div class="billing">
		<form id="payment-form" method="post">
			<div class="mb-3">
				<label for="name" class="form-label">Name:</label>
				<input type="text" class="form-control" id="name" name="name" value="<?php echo $user_login;?>">
			</div>

			<div class="mb-3">
				<label for="email" class="form-label">Email:</label>
				<input type="email" class="form-control" id="billing_email" name="bill_email" value="<?php echo $user_email;?>">
			</div>

			<div class="mb-3">
				<label for="contact" class="form-label">Contact No:</label>
				<input type="text" class="form-control" id="contact" name="contact" required maxlength="10">
			</div>

			<div class="mb-3">
				<label for="card_no" class="form-label">Card No:</label>
				<input type="text" class="form-control" id="card_no" name="card_no" required maxlength="16">
			</div>

			<div class="mb-3">
				<label for="cvc" class="form-label">CVC:</label>
				<input type="text" class="form-control" id="cvc" name="cvc" required maxlength="3">
			</div>

			<div class="mb-3">
				<label for="expiration-month" class="form-label">Expiration Month:</label>
				<select class="form-control" id="expiration-month" name="expiration-month" required>
					<option value="">-- Select Month --</option>
					<option value="01">January</option>
					<option value="02">February </option>
					<option value="03">March</option>
					<option value="04">April</option>
					<option value="05">May</option>
					<option value="06">June</option>
					<option value="07">July</option>
					<option value="08">August</option>
					<option value="09">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
			</div>

			<div class="mb-3">
				<label for="expiration-year" class="form-label">Expiration Year:</label>
				<select class="form-control" id="expiration-year" name="expiration-year" required>
					<option value="">-- Select Year --</option>
					<option value="24"> 2024</option>
					<option value="25"> 2025</option>
					<option value="26"> 2026</option>
					<option value="27"> 2027</option>
					<option value="28"> 2028</option>
					<option value="30"> 2030</option>
					<option value="31"> 2031</option>
					<option value="32"> 2032</option>
					<option value="33"> 2033</option>
				</select>
			</div>

			<div class="mb-3">
				<label for="amount" class="form-label">Amount:</label>
				<input type="text" class="form-control" id="amount" name="amount" readonly value="<?php echo $total_amount; ?>">
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
			<input type="hidden" name="action" value="create_payment_intent_callback">
			<input type="hidden" name="data" value="<?php echo base64_encode(json_encode($newteacherdata)); ?>">
		</form>
		
		<div id="response"></div>
	</div>
</div>
<?php wp_footer(); ?>