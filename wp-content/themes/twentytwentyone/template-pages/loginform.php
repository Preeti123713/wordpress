<?php
/* Template Name: Login */

require_once('wp-load.php');

// if (is_user_logged_in()) {
//     $current_user = wp_get_current_user();
//     echo "Welcome to the member's area, " . esc_html($current_user->user_login) . "!";
// } else { // Registration logic
//     print_r($_POST);
//     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
//         $email = sanitize_email($_POST['email']);
//         $password = $_POST['password'];
//         $first_name = $_POST['first_name'];
//         $last_name = $_POST['last_name'];

//             $user_data = array(
//                 'user_login' => $email,
//                 'user_email' => $email,
//                 'user_pass' => $password,
//                 'first_name' => $first_name,
//                 'last_name' => $last_name,
//                 'role' => 'student', // Assign the role 'student' to the user
//             );

//             $user_id = wp_insert_user($user_data);
//             if (is_wp_error($user_id)) {
//                 echo $user_id->get_error_message();
//             } else {
//                 echo "Registration successful";
//             }
//     }
// }

//     // Login logic
//     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_email']) && isset($_POST['login_password'])) {
//         $email = sanitize_email($_POST['login_email']); // Corrected the variable name
//         $password = $_POST['login_password']; // Corrected the variable name

//         $creds = array(
//             'user_login' => $email,
//             'user_password' => $password,
//             'remember' => true
//         );

//         $user = wp_signon($creds, false);

//         if (is_wp_error($user)) {
//             echo $user->get_error_message();
//         } else {
//             echo "Login successful";
//         }
//     }
add_action('wp_ajax_register_user_front_end', 'register_user_front_end');
add_action('wp_ajax_nopriv_register_user_front_end', 'register_user_front_end');

function register_user_front_end() {
	$first_name = sanitize_text_field($_POST['first_name']);
	$last_name = sanitize_text_field($_POST['last_name']);
	$email = sanitize_email($_POST['email']);
	$password = sanitize_text_field($_POST['password']);
	$user_nice_name = strtolower($email);
	$user_data = array(
		'user_login' => $first_name,
		'last_name' => $last_name,
		'user_email' => $email,
		'user_pass' => $password,
		'user_nicename' => $user_nice_name,
		'role' => 'student'
	);

	$user_id = wp_insert_user($user_data);

	if (!is_wp_error($user_id)) {
		echo 'Account created successfully.';
	} else {
		if (isset($user_id->errors['empty_user_login'])) {
			$notice_key = 'User Name and Email are mandatory';
			echo $notice_key;
		} elseif (isset($user_id->errors['existing_user_login'])) {
			echo 'Username already exists.';
		} else {
			echo 'An error occurred. Please fill out the sign-up form carefully.';
		}
	}

	wp_die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Online Teaching Platform</title>
    <!---we had linked our css file----->
<?php wp_head() ?>
</head>
<body>
    <div class="full-page">
        <div class="navbar">
            <div>
                <a href='website.html'>Online Teaching Platform</a>
            </div>
            <nav>
                <ul id='MenuItems'>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button></li></ul>
				</nav></div>
				<div id="registration-message" style="display: none;"></div>
				<div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button' class='toggle-btn login' >Log In</button>
                    <button type='button' class='toggle-btn register'>Register</button>
                </div>
                <form id='login' class='input-group-login' method="post">
            <input type='text' name="login_email" id="l_email"class='input-field'placeholder='Email Id'required >
		    <input type='password' name="login_password" id="l_password" class='input-field'placeholder='Enter Password' required>
		    <input type='checkbox'class='check-box'><span>Remember Password</span>
		    <button type='submit'class='submit-btn'>Log in</button>
		 </form>
        <form id='register' class='input-group-register' method="post">
		     <input type='text'class='input-field'placeholder='First Name' name="first_name" id="f_name" required>
		     <!-- <input type='text'class='input-field'placeholder='Last Name 'name="last_name" id="l_name" required> -->
		     <input type='email'class='input-field'placeholder='Email Id' name="email" id="email" required>
		     <input type='password'class='input-field'placeholder='Enter Password' name="password" id="password" required>
		     <!-- <input type='password'class='input-field'placeholder='Confirm Password' name="c_password" id="c_password" required> -->
		     <input type='checkbox'class='check-box'><span>I agree to the terms and conditions</span>
                    <button type='submit'class='submit-btn'  id="register-submit">Register</button>
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
</body>
</html>