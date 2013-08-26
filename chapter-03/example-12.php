<?php
$sqlQuery = $wpdb->prepare("SELECT user_login FROM $wpdb->users WHERE 
user_login LIKE '%%%s%%' OR
user_email LIKE '%%%s%%' OR
display_name LIKE '%%%s%%'", $user_query, $user_query, $user_query);
$user_logins = $wpdb->get_col($sqlQuery);
