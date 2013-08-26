<?php
function sp_init_browser_hacks()
{
	global $is_IE;
	if($is_IE)
	{
		//check version and load CSS
		$user_agent = strtolower($_SERVER[‘HTTP_USER_AGENT’]);
		if(strpos(“msie 6.”, $user_agent) !== false && 
		   strpos(“opera”, $user_agent) === false)
		{
			wp_enqueue_style(‘ie6-hacks’, get_stylesheet_directory_uri() . ‘/css/ie6.css’);
		}
	}

	if(wp_is_mobile())
	{
		//load our mobile CSS and JS
		wp_enqueue_style(‘sp-mobile’, get_stylesheet_directory_uri() . ‘/css/mobile.css’);
		wp_enqueue_script(‘sp-mobile’, get_stylesheet_directory_uri() . ‘/js/mobile.js’);
	}
}
add_action(“init”, “sp_init_browser_hacks”);
