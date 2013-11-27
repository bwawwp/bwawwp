<?php
/*
Plugin Name: JS Display Name
Plugin URI: http://bwawwp.com/js-display-name/
Description: A way to load the display name of a logged-in user through JavaScript
Version: .1
Author: Jason Coleman
Author URI: http://bwawwp.com
*/

/*
	use this function to place the JavaScript in your theme
	if(function_exists("jsdn_show_display_name"))
	{
		jsdn_show_display_name();
	}
*/
function jsdn_show_display_name($prefix = "Welcome,&nbsp;")
{
?>
<p>
	<script src="<?php echo admin_url("/admin-ajax.php?action=jsdn_show_display_name&prefix=" . urlencode($prefix));?>"></script>
</p>
<?php
}


/*
	This function detects the JavaScript call and returns the user's display name
*/
function jsdn_wp_ajax()
{
	global $current_user;
	if(!empty($current_user->display_name))
	{
		$prefix = sanitize_text_field($_REQUEST['prefix']);
		$text = $prefix . $current_user->display_name;

		header('Content-Type: text/javascript');
	?>
	document.write(<?php echo json_encode($text);?>);
	<?php
	}
	
	exit;
}
add_action('wp_ajax_jsdn_show_display_name', 'jsdn_wp_ajax');
add_action('wp_ajax_nopriv_jsdn_show_display_name', 'jsdn_wp_ajax');
