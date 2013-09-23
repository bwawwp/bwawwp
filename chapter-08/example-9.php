<?php
// let's pretend that a user added an email address "brian @ webdevstudios.com"
$user_email = 'brian @ webdevstudios.com';

// we can check if this is a valid email
$user_email = is_email( $user_email );

// we know it's not because it's set to nothing from is_email()
if ( ! $user_email )
	echo 'invalid email<br>';

// let's try again with sanitizing the email
$user_email = 'brian @ webdevs&tudios.com';

// use sanitize_email() to try to fix any invalid email
$user_email = sanitize_email( $user_email );

$user_email = is_email( $user_email );

if ( ! $user_email )
	echo 'invalid email<br>';
else
	echo 'valid email: ' . $user_email;

?>