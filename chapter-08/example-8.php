<?php
global $wpdb;

$user_status = 0;
$user_login = 'bmess';
$user_login2 = 'jcoleman';

$sql = "SELECT ID, user_registered 
FROM $wpdb->users 
WHERE user_status = %d 
AND ( user_login = %s OR user_login = %s )";

// prepare the SQL statement - the 1st parameter is the SQL statement itself 
// followed by a parameter for each variable passed into the SQL statement.
$prepared_sql = $wpdb->prepare( $sql, $user_status, $user_login, $user_login2 );
$results = $wpdb->get_results( $prepared_sql );
foreach ($results as $result) {
	echo 'ID: ' . $result->ID . '<br>';
	echo 'user_registered: ' . $result->user_registered . '<br>';
}
?>