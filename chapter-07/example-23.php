<?php
//schedule crons on plugin activation
function sp_activation()
{
	//do_action('sp_daily_cron'); will fire daily
	wp_schedule_event(time(), 'daily', 'sp_daily_cron');
}
register_activation_hook(__FILE__, 'sp_activation');

//clear our crons on plugin deactivation
function sp_deactivation()
{
	wp_clear_scheduled_hook('sp_daily_cron');
}
register_deactivation_hook(__FILE__, 'sp_deactivation');

//function to run daily
function sp_daily_cron()
{
	//do this daily
}
add_action("sp_daily_cron", "sp_daily_cron");