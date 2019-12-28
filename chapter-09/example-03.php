<?php
//frontend JavaScript
function sp_wp_enqueue_scripts() {
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script(
		'schoolpress-plugin-frontend',
		plugins_url( 'js/frontend.js', __FILE__ ),
		array( 'jquery' ),
		'1.0'
	);
}
add_action( "wp_enqueue_scripts", "sp_wp_enqueue_scripts" );

//admin JavaScript
function sp_admin_enqueue_scripts() {
	wp_enqueue_script(
		'schoolpress-plugin-admin',
		plugins_url( 'js/admin.js', __FILE__ ),
		array( 'jquery' ),
		'1.0'
	);
}
add_action( 'admin_enqueue_scripts', 'sp_admin_enqueue_scripts' );