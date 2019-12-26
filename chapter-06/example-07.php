<?php
// insert user from values we've gathered
$user_id = wp_insert_user( array(
	'user_login' => $username,
	'user_pass' => $password,
	'user_email' => $email,
	'first_name' => $firstname,
	'last_name' => $lastname
    )
);

// check if username or email has already been used
if ( is_wp_error( $user_id ) ){
    echo $return->get_error_message();
} else {
    // continue on with whatever you want to do with the new $user_id
}