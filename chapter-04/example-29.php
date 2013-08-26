<?php
function sp_wp_default_styles($styles)
{
	//use our app version constant
	$styles->default_version = SCHOOLPRESS_VERSION;
}
add_action("wp_default_styles", "sp_wp_default_styles");
