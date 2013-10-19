<?php
function schoolpress_load_textdomain() {
	load_theme_textdomain( 'schoolpress', get_template_directory() . '/languages/' );
}
add_action( 'init', 'schoolpress_load_textdomain', 1 );
?>