<?php
/* Template Name: Payment */
get_header();
// print_r($_GET);
require_once 'vendor/autoload.php';
$pplan = [];
$pricee = [];
$result = json_decode(base64_decode($_GET['teacherdataa'][0]));
$total_amount = 0;
$stripe = \Stripe\Stripe::setApiKey('sk_test_51OUNypSGWzwjArE7lJ5VQE88roEhuQnefI8qVx0sPYeq6sxW6N1OaWdAui73DEjDAVoRfx2xQVdrDMqpG29n2pip00RC84r9jT');
$paymentIntent = \Stripe\PaymentIntent::create([
	'amount' => '765',
	'currency' => 'USD',
	'description' => 'some data',
	'automatic_payment_methods' => [
		'enabled' => 'true'
	],
]);
// echo json_encode(array('client_secret' => $paymentIntent->client_secret));
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
			<?php $pplan[$res] = $_GET['pplan_' . $res];   ?>
			<p>Selected Plan: <?php echo $_GET['pplan_' . $res];  ?></p>
			<?php $pricee[$res] = $_GET['price_' . $res];   ?>
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
	<?php
	$teacherddata = array($result, $pplan, $pricee);
	$myArray = json_decode(json_encode($result), true);
	echo "<pre>";
	$resultNew = [];

	foreach ($myArray as $key => $value) {
		$resultNew[$key] = array($pplan[$key], $value[0], $value[1], $pricee[$key]);
	}

	?>
	<div class="billing" id="billing-form">

		<h2 class=""></h2>
		<form id="payment-form">
			<div id="link-authentication-element">
				<!-- Elements will create authentication element here -->
			</div>
			<div id="payment-element">
				<!-- Elements will create form elements here -->
			</div>
			<button id="submit">Pay now</button>
			<div id="error-message">
				<!-- Display error message to your customers here -->
			</div>
			<input type="hidden" name="$teacherddatanew[]" value="<?php echo base64_encode(json_encode($resultNew)); ?>">
		</form>

		<div id="messages" role="alert" style="display: none;"></div>

	</div>
	<?php wp_footer(); ?>
	<script>
		const stripe = Stripe('pk_test_51OUNypSGWzwjArE7IufmsMR1oJ2kmwaiUmDJhlRSwwSTf8fzcndxv1UdJhWU7HEBfBcvRw3K65Ouppgk3DkgEIEv00DkfmhyZX');
		const elements = stripe.elements({
			clientSecret: '<?= $paymentIntent->client_secret ?>'
		})
		// Create and mount the Payment Element
		const paymentElement = elements.create('payment');
		paymentElement.mount('#payment-element');
		const form = document.getElementById('payment-form');
		form.addEventListener('submit', async (event) => {
			event.preventDefault();

			const {
				error
			} = await stripe.confirmPayment({
				//`Elements` instance that was used to create the Payment Element
				elements,
				confirmParams: {
					// return_url: 'http://localhost/wordpress/wp-content/themes/twentytwentyone/template-pages/create_payment.php',
					return_url: 'http://localhost/wordpress/wp-content/themes/twentytwentyone/template-pages/create_payment_intent.php'
				},
			});

			if (error) {
				const messageContainer = document.querySelector('#error-message');
				messageContainer.textContent = error.message;
			}
			else {
                    const formData = $(this).serialize();
					$.ajax({
						type: 'Post',
						url:"http://localhost/wordpress/wp-content/themes/twentytwentyone/template-pages/create_payment_intent.php",
						data: formData,
						success:function(data){
							alert(data);
						},
						error:function(error){
							alert(error);
						}

					
					})
                }
            });
	</script>