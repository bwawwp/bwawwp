<?php
add_action( 'init', 'my_user_check' );

function my_user_check() {
	if ( is_user_logged_in() ) {
		// do something because a user is logged in
	}
}
?>