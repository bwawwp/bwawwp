<?php
//setup the database for the SchoolPress app
function sp_setupDB()
{
	global $wpdb;

	//shortcuts for SchoolPress DB tables
	$wpdb->schoolpress_assignment_submissions = $wpdb->prefix . 'schoolpress_assignment_submissions';

	$db_version = get_option('sp_db_version', 0);
	
	//create tables on new installs
	if(empty($db_version))
	{
		global $wpdb;

		$sqlQuery = "
		CREATE TABLE '" . $wpdb->schoolpress_assignment_submissions . "' (
		  `assignment_id` bigint(11) unsigned NOT NULL,
		  `submission_id` bigint(11) unsigned NOT NULL,
		  UNIQUE KEY `assignment_submission` (`assignment_id`,`submission_id`),
		  UNIQUE KEY `submission_assignment` (`submission_id`,`assignment_id`)
		)
		";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta($sqlQuery);

		$db_version = '1.0';
		set_option('sp_db_version', '1.0');
	}
}
add_action('init', 'sp_dbSetup', 0);
