<?php
function sp_init_assignments_heartbeat()
{   
    //Ignore if we're not on an assignment page.
	if(strpos($_SERVER['REQUEST_URI'], "/assignment/") === false)
		return;
 
    //enqueue the Heartbeat API
    wp_enqueue_script('heartbeat');
    	
    //load our JavaScript in the footer
    add_action("wp_footer", "sp_wp_footer_assignments_heartbeat");
}
add_action('init', 'sp_init_assignments_heartbeat');
?>
