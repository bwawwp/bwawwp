<?php
// simple url with querystring example
function schoolpress_footer_nonce_url(){
	$url = wp_nonce_url( 
		add_query_arg( array( 'action' => 'get_users' ) ), 
		'get_users_nonce' 
	);
	echo '<p><a href="' . $url . '">Get Users</a></p>';
}
add_action( 'wp_footer', 'schoolpress_footer_nonce_url' );

// querystring action
function schoolpress_footer_nonce_url_action(){
	// check if querystring action is get_users and for the nonce
	if ( isset( $_GET['action'] ) 
		&& 'get_users' == $_GET['action'] 
		&& check_admin_referer( 'get_users_nonce' ) ) {
		echo 'Your action: ' . $_GET['action'];
		// or get your users and display them here...
	}
}
add_action( 'init', 'schoolpress_footer_nonce_url_action' );
?>