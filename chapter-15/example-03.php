<?php
//Restrict access to a page if a user hasn't purchased a specific download yet
function my_template_redirect_check_edd()
{
	global $current_user;

	//Set to slug of page to protect.
	$protected_page_slug = 'customers-only';

	//Set to ID of download to check for.
	$required_download_id = 184;

	//Only protecting one specific page.
	if(!is_page($protected_page_slug))
		return;

	//Redirect if no user or missing purchase.
	if(!is_user_logged_in() ||
	   !edd_has_user_purchased($current_user->ID, $required_download_id)) {
               wp_redirect(get_permalink($required_download_id));
		exit;
	}
}
add_action('template_redirect', 'my_template_redirect_check_edd');