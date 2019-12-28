<?php
function sp_load_admin_styles() {
	wp_enqueue_style(
		'schoolpress-plugin-admin',
		plugins_url( 'css/admin.css', __FILE__ ),
		array(),
		SCHOOLPRESS_VERSION,
		'screen'
	);
}
add_action( 'admin_enqueue_scripts', 'sp_load_admin_styles' );

function sp_load_frontend_styles() {
    wp_enqueue_style(
        'schoolpress-plugin-frontend',
        plugins_url( 'css/frontend.css', __FILE__ ),
        array(),
        SCHOOLPRESS_VERSION,
        'screen'
    );
}
add_action( 'wp_enqueue_scripts', 'sp_load_frontend_styles' );
?>