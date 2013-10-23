<?php
//add a monthly interval to use in cron jobs
function sp_cron_schedules($schedules)
{
	$schedules['monthly'] = array(
		'interval' => 60*60*24*30, //really 30 days
		'display' => 'Once a Month'
	);
}
add_filter( 'cron_schedules', 'sp_cron_schedules' );
?>
