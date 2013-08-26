<?php
define('SCHOOLPRESS_VERSION', '1.0');
function sp_wp_default_styles($styles)
{
    //use release version for stylesheets
	$styles->default_version = SCHOOLPRESS_VERSION;
}
add_action("wp_default_styles", "sp_wp_default_styles");
