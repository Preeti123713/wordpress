<?php
/* Template Name: Payment */
get_header();
// print_r($_GET);

$result = json_decode(base64_decode($_GET['teacherdataa'][0]));
// print_r($result);
$total_amount = 0;
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
			<p> Each Price : <?php echo $price = $_GET['price_' . $res]; ?></p>
			<?php
			$pricevalue = $price = substr($price, 1); // Extract characters after the dollar sign;
			$total_amount += $pricevalue;
			?>
		<?php } ?>
		<h4>
			<p> Total Amount : <?php echo  $total_amount; ?></p>
		</h4>
	</div>
	<div class="billing" id="billing-form">

		<h2 class=""></h2>
		<form method="post" id="payment-form">
			<div class="form-row">
				<label for="payment-element">
					Credit or debit card
				</label>
				<div id="payment-element">
    <!-- Mount the Payment Element here -->
  </div>

				<!-- Used to display Element errors. -->
				<div id="card-errors" role="alert"></div>
			</div>

			<button>Submit Payment</button>
		</form>
	</div>
</div>
<?php wp_footer(); ?>
<script>
	const stripe =
    Stripe('pk_test_51OUNypSGWzwjArE7IufmsMR1oJ2kmwaiUmDJhlRSwwSTf8fzcndxv1UdJhWU7HEBfBcvRw3K65Ouppgk3DkgEIEv00DkfmhyZX');
const options = {
  mode: 'payment',
  currency: 'usd',
  amount: 1099,
};
const elements = stripe.elements(options);
const paymentElement = elements.create("payment");
paymentElement.mount("#payment-element");
const handleSubmit = async (event) => {
  event.preventDefault();
  alert("jj");

  if (!stripe) {
    // Stripe.js hasn't yet loaded.
    // Make sure to disable form submission until Stripe.js has loaded.
    return;
  }

  setLoading(true);

  // Trigger form validation and wallet collection
  const {error: submitError} = await elements.submit();
  if (submitError) {
    handleError(submitError);
    return;
  }

  // Create the PaymentIntent and obtain clientSecret

  const res = await fetch("/wp-content/themes/twentytwentyone/template-pages/stripe.php", {
    method: "POST",
    headers: {"Content-Type": "application/json"},
  });

  const {client_secret: clientSecret} = await res.json();

  // Use the clientSecret and Elements instance to confirm the setup
  const {error} = await stripe.confirmPayment({
    elements,
    clientSecret,
    confirmParams: {
      return_url: 'https://example.com/order/123/complete',
    },
    // Uncomment below if you only want redirect for redirect-based payments
    // redirect: "if_required",
  });

  if (error) {
    handleError(error);
  }
};
	
	
</script>