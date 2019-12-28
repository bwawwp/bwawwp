<?php
function my_template_redirect()
{
	$okay_pages = array(
        pmpro_getOption('billing_page_id'),
        pmpro_getOption('account_page_id'),
        pmpro_getOption('levels_page_id'),
        pmpro_getOption('checkout_page_id'),
        pmpro_getOption('confirmation_page_id')
    );

	//if the user doesn't have a membership, send them home
	if(!is_user_logged_in()
		&& !is_home()
		&& !is_page($okay_pages)
		&& !strpos($_SERVER['REQUEST_URI'], "login"))
	{
	    wp_redirect(home_url('wp-login.php?redirect_to='.
            urlencode($_SERVER['REQUEST_URI'])));
	}
	elseif(is_page()
			&& !is_home()
			&& !is_page($okay_pages)
			&& !pmpro_hasMembershipLevel()
	{
		wp_redirect(home_url());
	}
}
add_action('template_redirect', 'my_template_redirect');