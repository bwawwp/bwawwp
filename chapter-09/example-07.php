<?php
//detect Ajax request for check_username
function wp_ajax_check_username() {
    global $wpdb;
	$username = $_REQUEST['username'];

	$taken = username_exists( $username );

	if ( $taken )
		echo "0";   //taken
	else
		echo "1";   //available
}
add_action( 'wp_ajax_check_username', 'wp_ajax_check_username' );
add_action( 'wp_ajax_nopriv_check_username', 'wp_ajax_check_username' );