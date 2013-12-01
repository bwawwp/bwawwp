<?php
//welcome the logged in user
global $current_user;
if ( !empty( $current_user->ID ) ) {
	echo 'Howdy, ' . $current_user->display_name;
}
?>