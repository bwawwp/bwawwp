<?php
function schoolpress_init_verify_nonce(){
	if ( isset( $_GET['sp_nonce'] ) 
		&& wp_verify_nonce( $_GET['sp_nonce'], 'random_nonce_action' ) ) {
		echo 'You have a valid nonce!';
	} else {
		echo 'You have an invalid nonce!';
	}
}
add_action( 'init', 'schoolpress_init_verify_nonce' );
?>
