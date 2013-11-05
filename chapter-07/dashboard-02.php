<?php
// Remove all default WordPress dashboard widgets
function sp_remove_dashboard_widgets() 
{
 	remove_meta_box('dashboard_browser_nag', 'dashboard', 'normal');
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
	remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
	
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
	remove_meta_box('dashboard_primary', 'dashboard', 'side');
	remove_meta_box('dashboard_secondary', 'dashboard', 'side');
} 
add_action('wp_dashboard_setup', 'sp_remove_dashboard_widgets');
?>
