//enqueue heartbeat.js and our JavaScript
function hbdemo_init()
{   
    /*
    	//Add your conditionals here so this runs on the pages you want, e.g.
		if(is_admin())
			return;			//don't run this in the admin
	*/
 
    //enqueue the Heartbeat API
    wp_enqueue_script('heartbeat');
    	
    //load our JavaScript in the footer
    add_action("wp_footer", "hbdemo_wp_footer");
}
add_action('init', 'hbdemo_init');
