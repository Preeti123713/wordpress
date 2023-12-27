<?php
/* Template Name: Login */
get_header();
?>
<div class="container">
<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
       Login
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        <<nav class="nav nav-pills nav-justified">
  <a class="nav-link active" aria-current="page" href="#">Login</a>
  <a class="nav-link" href="#">Register</a>
</nav>
      </div>
    </div>
  </div>
</div>

		<div class="navbar">
			<header>
				<nav>
					<ul id='MenuItems'>
						<li class="header"><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button></li>
					</ul>
				</nav>
		</div>
		</header>
		<div id="registration-message" style="display: none;"></div>
		<div id='login-form' class='login-page'>
			<div class="form-box">
				<div class='button-box'>
					<div id='btn'></div>
					<button type='button' class='toggle-btn login'>Log In</button>
					<button type='button' class='toggle-btn register'>Register</button>
				</div>
				<form id='login' class='input-group-login' method="post">
					<input type='text' name="login_email" id="l_email" class='input-field' placeholder='Email Id' required>
					<input type='password' name="login_password" id="l_password" class='input-field' placeholder='Enter Password' required>
					<input type='checkbox' class='check-box'><span>Remember Password</span>
					<button type='submit' class='submit-btn'>Log in</button>
				</form>
				<form id='register' class='input-group-register' method="post">
					<input type='text' class='input-field' placeholder='First Name' name="first_name" id="f_name" required>
					<!-- <input type='text'class='input-field'placeholder='Last Name 'name="last_name" id="l_name" required> -->
					<input type='email' class='input-field' placeholder='Email Id' name="email" id="email" required>
					<input type='password' class='input-field' placeholder='Enter Password' name="password" id="password" required>
					<!-- <input type='password'class='input-field'placeholder='Confirm Password' name="c_password" id="c_password" required> -->
					<input type='checkbox' class='check-box'><span>I agree to the terms and conditions</span>
					<button type='submit' class='submit-btn' id="register-submit">Register</button>
				</form>
			</div>
		</div>
		<div class="billing" id="billing-form">
			<form action="">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" value="" required><br><br>

				<label for="amount">Total Amount</label>
				<input type="number" id="amount" name="amount" value="" required><br><br>

				<label for="card-number">Card Number</label>
				<input type="number" id="card-number" name="card-number" value="" required><br><br>

				<label for="cvc">CVC</label>
				<input type="number" id="cvc" name="cvc" value="" required><br><br>

				<label for="expiry-date">Expiry Date</label>
				<input type="number" id="expiry-date" name="expiry-date" value="" required><br><br>

				<button type="submit" value="Submit">Submit</button>
			</form>
		</div>
	</div>
	<?php wp_footer(); ?>