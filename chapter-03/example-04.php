<?php
function sp_load_styles()
{
	if(is_admin())
		wp_enqueue_style(‘schoolpress-plugin-admin’, plugins_url('css/admin.css',__FILE__ ), array(), SCHOOLPRESS_VERSION, “screen”);
	else
		wp_enqueue_style(‘schoolpress-plugin-frontend’, plugins_url('css/frontend.css',__FILE__ ), array(), SCHOOLPRESS_VERSION, “screen”);
}
add_action(“init”, “sp_load_styles”);
