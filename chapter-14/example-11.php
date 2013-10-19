<?php
function localize_schoolpress_images_url( $url ) {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'schoolpress' );
	if ( $locale != 'en_US' )
		$url = SCHOOLPRESS_URL . '/languages/' . $locale . '/images/';

	return $url;
}
add_filter( 'schoolpress_images_url', 'localize_schoolpress_images_url' );
?>