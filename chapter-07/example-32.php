<?php
/**
* Plugin Name: The Teacher Life Saver
* Plugin URI:  https://schoolpress.me/
* Description: Alert teachers of parent arrivals
* Version:     0.0.1
*/

// Action hook for creating a dashboard widget
function ttls_dashboard_widget() {
	global $wp_meta_boxes;

// widget ID, widget name, callback function
wp_add_dashboard_widget('ttls_widget', 'Student Pick Ups', 'ttls_dashboard');
}
add_action('wp_dashboard_setup', 'ttls_dashboard_widget');

// Markup for the dashboard widget
function ttls_dashboard() {
	echo "<div id='ttls_message'></div>";
}

// Change the default pulse to every 15 seconds so we don't have to wait as long
function ttls_heartbeat_settings( $settings ) {
    $settings['interval'] = 15; // Anything between 15-60 seconds
    return $settings;
}
add_filter( 'heartbeat_settings', 'ttls_heartbeat_settings', 1 );

// Enqueue heartbeat.js and our JavaScript functions
function ttls_heartbeat_init()
{
	  // Only run this on the dashboard page (index.php)
	  global $pagenow;
	  if( $pagenow != 'index.php' )
		  return;

  // Enqueue the Heartbeat API
  wp_enqueue_script('heartbeat');

  // Load our JavaScript functions in the footer
  add_action("admin_footer", "ttls_js_wp_footer");
}
add_action("admin_init", "ttls_heartbeat_init");

// JavaScript functions ran in the footer
function ttls_js_wp_footer()
{
?>
<script>
jQuery(document).ready(function() {

// Use heartbeat-send to send any keys/values in the data array
	jQuery(document).on('heartbeat-send', function(e, data) {
		data['client'] = 'check-for-parents';
});

// Use heartbeat-tick function check for data and take action
jQuery(document).on('heartbeat-tick', function(e, data) {
if(data['server'])
	document.getElementById("ttls_message").innerHTML = data['server'] 
	+ document.getElementById("ttls_message").innerHTML;
	});
});
</script>
<?php
}

// Server-side function to receive and process the request then return a response
function ttls_heartbeat_received($response, $data)
{
// Look for whatever data was passed from JS heartbeat-send function
if($data['client'] == 'check-for-parents')
{
  // Build whatever response you want
  $r = '<p>';
  $r .= date( 'm/j/y g:i a', current_time( 'timestamp', 0 ) );
  $r .= " - Nina Messenlehner's father Brian Messenlehner ";
  $r .= "has arrived in a 2007 White Hummer H2.";
  $r .= '</p>';

  return $r;
}
add_filter('heartbeat_received', 'ttls_heartbeat_received', 10, 2);