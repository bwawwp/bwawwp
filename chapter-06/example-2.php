<?php
// get the currently logged-in user
$user = wp_get_current_user();

// echo the user's display_name
echo $user->display_name;

// use user's email address to send an email
wp_mail( $user->user_email, 'Email Subject', 'Email Body' );

// get any user meta value
echo 'Department: ' . $user->department;
?>