<?php
define( 'SCHOOLPRESS_VERSION', '1.0' );
function sp_enqueue_theme_styles() {
	if ( !is_admin() ) {
		wp_enqueue_style( 'schoolpress-theme', 
			get_stylesheet_directory_uri() . '/css/main.css', 
			NULL, 
			SCHOOLPRESS_VERSION 
		);
	}
}
add_action( 'init', 'sp_enqueue_theme_styles' );
?>