<?php
//cron will fire do_action('sp_daily_cron') daily starting now
wp_schedule_event(time(), 'daily', 'sp_daily_cron');

//which functions are called back for the sp_daily_cron action
add_action("sp_daily_cron", "sp_daily_cron");

//this function fires on the sp_daily_cron action
function sp_daily_cron()
{
	/*
	  Do this daily.
	*/
}
?>
