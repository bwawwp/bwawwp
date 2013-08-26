<?php
global $wpdb;
$sqlQuery = "SELECT * FROM $wpdb->posts WHERE post_type = 'assignment' AND post_status = 'publish' LIMIT 10";
$assignments = $wpdb->get_results($sqlQuery);

//rows are stored in an array, use foreach to loop through them
foreach($assignments as $assignment)
{
	//each item in the array is an object with property names equal to the SQL column names
?>
<h3><?php echo $assignment->post_title;?></h3>
<?php echo apply_filters("the_content", $assignment->post_content);?>
<?php
}
