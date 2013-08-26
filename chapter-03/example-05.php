<?php
function sp_load_scripts()
{
	if(is_admin())
		wp_enqueue_script(‘schoolpress-plugin-admin’, plugins_url('js/admin.js',__FILE__ ), array(‘jquery’), SCHOOLPRESS_VERSION);
	else
		wp_enqueue_script(‘schoolpress-plugin-frontend’, plugins_url('js/frontend.js',__FILE__ ), array(‘jquery’), SCHOOLPRESS_VERSION);
}
add_action(“init”, “sp_load_scripts”);
