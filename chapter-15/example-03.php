<?php
/*
Plugin Name: Always HTTPS
Plugin URI: http://www.strangerstudios.com/wp/always-https
Description: Redirect all URLs to the HTTPS version.
Version: .1
Author: strangerstudios
*/

/*
	Make sure to set FORCE_SSL_ADMIN to true.
	Add the following to your wp-config.php:

	define('FORCE_SSL_ADMIN', true);
*/

//redirect to https
function always_https_redirect()
{
	//if FORCE_SSL_ADMIN is true and we're not over HTTPS
	if(force_ssl_admin() && !is_ssl())
	{
		//redirect to https version of the page
		wp_redirect("https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		exit;
	}
}
add_action('wp', 'always_https_redirect', 2);
add_action('login_init', 'always_https_redirect', 2);

//(optional) Tell Paid Memberships Pro to get on board with the HTTPS redirect.
add_filter("pmpro_besecure", "__return_true");
?>
