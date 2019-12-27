<?php
//run on Mondays
function sp_monday_cron()
{
	//get day of the week, 0-6, starting with Sunday
	$weekday = date("w");

	//is it Monday?
	if($weekday == "1")
	{
		//execute this code on Mondays
	}
}
add_action("sp_daily_cron", "sp_monday_cron");