<?php
function my_check_host_site_membership() {
	global $current_user;

  // Change these values.
	$host_site_url = 'https://hostsite.com/';
  $restricted_post_id = 2;
  $apiuser = 'apiuser';
  $apipassword = 'apipassword';

	// We're only blocking the specific post ID
	$queried_object = get_queried_object();
	if ( empty( $queried_object )
       || $queried_object->ID != $restricted_post_id ) {
		return;
	}

	// If not logged in, redirect to the host site
	if ( ! is_user_logged_in() ) {
		wp_redirect( $host_site_url );
		exit;
	}

	// Check for membership at host site.
	$url = esc_url(
    $host_site_url
    . '/wp-json/wp/v2/users/?search='
    . urlencode( $current_user->user_email )
    );
	$args = array(
		'headers' => array(
			'Authorization' => 'Basic '
        . base64_encode( $apiuser . ':' . $apipassword ),
		),
	);

	// Make sure our first request was successful.
	$response = wp_remote_get( $url, $args );
	if ( empty( $response ) || $response['response']['code'] != '200' ) {
		wp_redirect( $host_site_url );
		exit;
	}

	// Make sure we found a user.
	$response_body = json_decode( $response['body'] );
	if ( empty( $response_body ) ) {
		wp_redirect( $host_site_url );
		exit;
	}

	// The result from the user search is an array. Grab the first one.
	$host_user = $response_body[0];

	// Check the user's membership at the host site.
	$url = esc_url(
    $host_site_url
    . '/wp-json/wp/v2/users/'
    . $host_user->id
    . '/pmpro_membership_level'
    );
	$response = wp_remote_get( $url, $args );

	// Make sure the second request was successful.
	if ( empty( $response ) || $response['response']['code'] != '200' ) {
		wp_redirect( $host_site_url );
		exit;
	}

	// Check for a membership level
	$membership_level = json_decode( $response['body'] );
	if ( empty( $membership_level ) ) {
		wp_redirect( $host_site_url );
		exit;
	}

	/*
		If we get here, $membership_level will contain information
		about the user's level. We could check for a specific level
		or just stop here to let users of all levels view this page.
	*/
}
add_action( 'template_redirect', 'my_check_host_site_membership' );