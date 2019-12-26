<?php
// get the WP_User object WordPress creates for the currently logged-in user
global $current_user;

// get the currently logged-in user with the wp_get_current_user() function
$user = wp_get_current_user();

// set some variables
$user_id = 1;
$username = 'jason';
$email = 'jason@strangerstudios.com';

// get a user by ID
$user = wp_getuserdata( $user_id );

// get a user by another field
$user1 = wp_get_user_by( 'login', $username );
$user2 = wp_get_user_by( 'email', $email );

// use the WP_User constructor directly
$user = new WP_User( $user_id );

//use the WP_User constructor with a username
$user = new WP_User( $username );