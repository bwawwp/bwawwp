<?php
// processing new submissions for assignments
global $wpdb, $current_user;

// create submission
$assignment_id = intval( $_REQUEST['assignment_id'] );
$submission_id = wp_insert_post(
	array(
		'post_type'    => 'submission',
		'post_author'  => $current_user->ID,
		'post_title'   => sanitize_title( $_REQUEST['title'] ), 
		'post_content' => sanitize_text_field( $_POST['submission'] )
	)
);

// connect the submission to the assignment
$wpdb->insert(
	$wpdb->schoolpress_assignment_submissions,
	array( "assignment_id"=>$assignment_id, "submission_id"=>$submission_id ),
	array( '%d', '%d' )
);

/*
	This insert call will generate a SQL query like:
	()
*/
?>