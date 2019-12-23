<?php
global $wpdb;
$user_query = $_REQUEST['uq'];

$sqlQuery = "SELECT user_login FROM $wpdb->users WHERE
user_login LIKE '%" . esc_sql($user_query) . "%' OR
user_email LIKE '%" . esc_sql($user_query) . "%' OR
display_name LIKE '%" . esc_sql($user_query) . "%'
";
$user_logins = $wpdb->get_col($sqlQuery);

if(!empty($user_logins))
{
	echo "<ul>";
foreach($user_logins as $user_login)
	{
		echo "<li>$user_login</li>";
}
echo "</ul>";
}