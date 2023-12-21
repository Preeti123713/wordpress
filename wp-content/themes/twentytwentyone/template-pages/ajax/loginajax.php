<?php 
echo "hello";
// AJAX Handlers
add_action('wp_ajax_nopriv_ajax_login', 'ajax_login');
add_action('wp_ajax_nopriv_ajax_register', 'ajax_register');

// Login Function
function ajax_login() {
    check_ajax_referer('ajax-auth-nonce', 'security');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = wp_authenticate($username, $password);

    if (is_wp_error($user)) {
        echo json_encode(array('loggedin' => false, 'message' => 'Invalid username or password.'));
    } else {
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);
        echo json_encode(array('loggedin' => true, 'message' => 'Login successful.'));
    }
    die();
}



?>