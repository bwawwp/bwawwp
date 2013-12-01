<?php
// get the IDs of all users with children named Isaac
$parents_of_isaac = $wpdb->get_col( "SELECT user_id 
	FROM $wpdb->usermeta 
	WHERE meta_key = 'children' 
	AND meta_value = 'Isaac'" );
?>