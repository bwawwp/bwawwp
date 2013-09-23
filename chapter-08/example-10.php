<?php
function schoolpress_footer_create_nonce(){
	$nonce = wp_create_nonce('random_nonce_action');
	$url = add_query_arg( array( 'sp_nonce' => $nonce ) );
	echo '<p><a href="' . $url . '">Verify this Nonce</a></p>';
}
add_action( 'wp_footer', 'schoolpress_footer_create_nonce' );
?>