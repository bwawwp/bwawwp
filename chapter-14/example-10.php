<?php
// Gets the full URL for an image given the image filename.
function schoolpress_get_image( $image ) {
	$dir = apply_filters( 'schoolpress_images_url', SCHOOLPRESS_URL . '/images/' );
	return $dir . $image;
}
?>