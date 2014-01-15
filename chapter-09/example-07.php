<?php
//detect AJAX request for check_username
function wp_ajax_check_username() {
	global $wpdb;
	$username = $_REQUEST['username'];

	$taken = $wpdb->get_var( "
		SELECT user_login 
		FROM $wpdb->users 
		WHERE user_login = '" . $wpdb->escape( $username ) . "' LIMIT 1" 
		);

	if ( $taken )
		echo "0";   //taken
	else
		echo "1";   //available
}
add_action( 'wp_ajax_check_username', 'wp_ajax_check_username' );
add_action( 'wp_ajax_nopriv_check_username', 'wp_ajax_check_username' );
?>
