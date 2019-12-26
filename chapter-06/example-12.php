<?php
//this file contains wp_delete_user and is not always loaded, so let's make sure
require_once( ABSPATH . '/wp-admin/includes/user.php' );

//delete the user
wp_delete_user( $user_id );

//or delete a user and reassign their posts to user with ID #1
wp_delete_user( $user_id, 1 );