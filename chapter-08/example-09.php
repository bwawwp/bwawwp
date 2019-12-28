<?php
// pretend a user added an email address "jason @ stranger$tudios.com"
$user_email = 'jason @ stranger$tudios.com';

// we can check if this is a valid email
$valid_email = is_email( $user_email );

// we know it's not because it's set to nothing from is_email()
if ( ! $valid_email )
	echo 'invalid email<br />';

// let's try again with sanitizing the email
$user_email = 'jason @ stranger$tudios.com';

// use sanitize_email() to try to fix any invalid email
$user_email = sanitize_email( $user_email );

$valid_email = is_email( $user_email );

if ( ! $valid_email )
	echo 'invalid email<br />';
else
	echo 'valid email: ' . $user_email;