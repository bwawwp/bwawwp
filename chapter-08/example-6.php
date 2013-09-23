<?php
function schoolpress_wp_login_filter( $url, $path, $orig_scheme ) {
	$old  = array( "/(wp-login\.php)/" );
	$new  = array( "new-login" );
	return preg_replace( $old, $new, $url, 1 );
}
add_filter( 'site_url',  'schoolpress_wp_login_filter', 10, 3 );


function schoolpress_wp_login_redirect() {
	if ( strpos( $_SERVER["REQUEST_URI"], 'new-login' ) === false ) {
		wp_redirect( site_url() );
		exit();
	}
}
add_action( 'login_init', 'schoolpress_wp_login_redirect' );
?>