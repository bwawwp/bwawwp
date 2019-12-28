<?php
// Don't run if not using SSL
if ( ! is_ssl() ) {
  return $user;
}

// Don't run unless using our route.
if ( ! empty( $_REQUEST['rest_route'] ) ) {
	$rest_route = '/' . rest_get_url_prefix() . $_REQUEST['rest_route'];
} else {
	$rest_route = $_SERVER['REQUEST_URI'];
}
if ( $rest_route != '/' . rest_get_url_prefix() . '/wp-sso/v1/check' ) {
	return $user;
}