<?php
function sp_heartbeat_settings($settings = array())
{
    $settings['interval'] = 20;  //20 seconds vs 15 second default    
    return $settings;
}
add_filter('heartbeat_settings', 'sp_heartbeat_settings');
?>
