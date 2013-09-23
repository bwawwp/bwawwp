<?php
function schoolpress_admin_check() {
	global $user_ID;
	if ( !user_can( $user_ID, 'administrator' ) )
		wp_redirect( site_url() );
}
add_action( 'admin_init', 'schoolpress_admin_check' );
?>