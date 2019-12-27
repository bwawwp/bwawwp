<?php
function my_https_filter($s) {
	if(is_ssl())
		return str_replace("http:", "https:", $s);
	else
		return str_replace("https:", "http:", $s);
}
add_filter('bloginfo_url', 'my_https_filter');
add_filter('wp_list_pages', 'my_https_filter');
add_filter('option_home', 'my_https_filter');
add_filter('option_siteurl', 'my_https_filter');
add_filter('logout_url', 'my_https_filter');
add_filter('login_url', 'my_https_filter');
add_filter('home_url', 'my_https_filter');