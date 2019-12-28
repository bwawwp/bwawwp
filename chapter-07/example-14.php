<?php
//Remove network dashboard widgets
function sp_remove_network_dashboard_widgets()
{
  remove_meta_box('network_dashboard_right_now', 'dashboard-network', 'normal');
  remove_meta_box('dashboard_plugins', 'dashboard-network', 'normal');
  remove_meta_box('dashboard_primary', 'dashboard-network', 'side');
  remove_meta_box('dashboard_secondary', 'dashboard-network', 'side');
}
add_action('wp_network_dashboard_setup', 'sp_remove_network_dashboard_widgets');