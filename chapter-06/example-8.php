<?php
// okay, log them in to WP							
$creds = array();
$creds['user_login'] = $username;
$creds['user_password'] = $password;
$creds['remember'] = true;
$user = wp_signon( $creds, false );	
?>