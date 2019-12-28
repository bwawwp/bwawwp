<?php
//lock down our members group
function my_buddy_press_members_group()
{
  $uri = $_SERVER['REQUEST_URI'];
	if(strtolower(substr($uri, 0, 16)) == "/groups/members/")
	{
		//make sure they are a member
		if(!pmpro_hasMembershipLevel())
		{
			wp_redirect(pmpro_url("levels"));
			exit;
		}
	}
}
add_action("init", "my_buddy_press_members_group");