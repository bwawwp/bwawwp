<?php
function wpsso_register_routes() {
  $options = wpsso_get_options();

	// Make sure host option is enabled.
	if ( ! $options['host'] ) {
		return;
	}

	register_rest_route(
		'wp-sso/v1',
		'/check',
		array(
			'methods'  => WP_REST_Server::READABLE,
			'callback' => 'wpsso_check_authentication_endpoint',
		)
	);
}
add_action( 'rest_api_init', 'wpsso_register_routes' );