<?php
function my_hide_sale_banner_script() {
	global $current_user;

	wp_register_script(
		'hide-sale-banner',
		plugins_url( 'js/hide-sale-banner.js', __FILE__ ),
		array( 'jquery' )
	);

	wp_localize_script( 'hide-sale-banner', 'HSBSettings', array(
		'root' => esc_url_raw( rest_url() ),
		'nonce' => wp_create_nonce( 'wp_rest' ),
		'current_user_id' => $current_user->ID,
	) );

	wp_enqueue_script( 'hide-sale-banner' );
}
add_action( 'wp_enqueue_scripts', 'my_hide_sale_banner_script' );