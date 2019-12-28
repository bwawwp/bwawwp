<?php
/*
Plugin Name: Stop Plugin Updates
Plugin URI: http://bwawwp.com/plugins/stop-plugin-updates/
Description: "Allow Updates: No" i a plugin's header keeps it from updating.
Version: .1
Author: Stranger Studios
Author URI: http://www.strangerstudios.com
*/

//add AllowUpdates header to plugin
function spu_extra_plugin_headers( $headers ) {
    $headers['AllowUpdates'] = "Allow Updates";
	return $headers;
}
add_filter( "extra_plugin_headers", "spu_extra_plugin_headers" );

/*
	loop through plugins
	check if updates are disallowed and if so remove it from list
*/
function spu_pre_set_site_transient_update_plugins( $update_plugins ) {
  //see if there are any plugins needing updates
  if ( !empty( $update_plugins ) && !empty( $update_plugins->response ) ) {
    //loop through plugins
    $new_plugins = array();
    foreach ( $update_plugins->response as $pluginpath => $plugin ) {
	//check if the plugin is allowed or not
	$plugin_data = ABSPATH . '/wp-content/plugins/' . $pluginpath;
	$plugin_data = get_plugin_data( $plugin_data );
	if ( strtolower( $plugin_data['Allow Updates'] ) == "no" ||
	  strtolower( $plugin_data['Allow Updates'] ) == "false" ) {
	  //change checked version and don't add to the new response
	  $update_plugins->checked[$pluginpath] = $plugin_data['Version'];
	}
	else {
		//not blocked. add plugin to new response
		$new_plugins[$pluginpath] = $plugin;
	}
    }
    $update_plugins->response = $new_plugins;
  }

return $update_plugins;
}
add_action(
	'pre_set_site_transient_update_plugins',
	'spu_pre_set_site_transient_update_plugins'
);