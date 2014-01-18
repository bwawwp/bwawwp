<?php
function my_plugin_wp_footer() {
    echo 'I read Building Web Apps with WordPress 
    and now I am a WordPress Genius!';
}
add_action( 'wp_footer', 'my_plugin_wp_footer' );
?>
