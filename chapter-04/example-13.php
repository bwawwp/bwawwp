<?php
function memberlite_child_init() {
	wp_enqueue_style(
		'bootstrap',
		get_stylesheet_directory_uri() .
            '/bootstrap/css/bootstrap.min.css',
		'style',
		'3.0'
	);
	wp_enqueue_script(
		'bootstrap',
		get_stylesheet_directory_uri() .
            '/bootstrap/js/bootstrap.min.js',
		'jquery',
		'3.0'
	);
}
add_action( 'init', 'memberlite_child_init' );
?>