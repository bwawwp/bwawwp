<?php
//run on Mondays
function sp_monday_cron()
{
	//check that cron param was passed in
	if(empty($_REQUEST['sp_cron_monday']))
		return false;
		
	//execute this code on Mondays
}
add_action("init", "sp_monday_cron");
?>
