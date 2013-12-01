<?php
// Gets the full path for an email template given the email filename.
function schoolpress_get_email( $email ) {
	$dir = apply_filters( 'schoolpress_emails_path', SCHOOLPRESS_PATH . '/emails/' );
	return $dir . $image;
}

// Filters the schoolpress_emails_path value based on locale. 
// Put this in includes/localization.php
function localize_schoolpress_emails_path( $path ) {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'schoolpress' );
	if ( $locale != 'en_US' )
		$path = SCHOOLPRESS_PATH . '/languages/' . $locale . '/emails/';

	return $path;
}
add_filter( 'schoolpress_emails_path', 'localize_schoolpress_emails_path' );
?>