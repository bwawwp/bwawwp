<?php
// checking the same nonce "sp_nonce" that was created earlier
function schoolpress_init_check_admin_referer(){
	if ( isset( $_GET['sp_nonce'] ) && 
	     check_admin_referer( 'random_nonce_action', 'sp_nonce' ) ) {
		echo '<p>You have a valid nonce!</p>';
	} else {
		echo '<p>You have an invalid nonce!</p>';
	}
}
add_action( 'init', 'schoolpress_init_check_admin_referer' );