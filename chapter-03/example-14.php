<?php
global $wpdb;
$sqlQuery = "SELECT ID FROM $wpdb->posts
	WHERE post_type = 'assignment'
	AND post_status = 'publish'
	LIMIT 10";
// getting IDs
$assignment_ids = $wpdb->get_col( $sqlQuery );

// result is an array, loop through them
foreach ( $assignment_ids as $assignment_id ) {
	// we have the id, we can use get_post to get more data
	$assignment = get_post( $assignment_id );
	?>
	<h3><?php echo $assignment->post_title;?></h3>
	<?php echo apply_filters( "the_content", $assignment->post_content );?>
	<?php
}
?>