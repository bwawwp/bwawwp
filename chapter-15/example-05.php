<?php
function my_besecure()
{
  global $besecure, $post;

	//check the post meta for a besecure custom field
	if(!empty($post->ID) && !$besecure)
		$besecure = get_post_meta($post->ID, "besecure", true);

	//if forcing ssl on admin, be secure in admin and login page
	if(!$besecure && force_ssl_admin() && (is_admin() || my_is_login_page()))
		$besecure = true;		

	//if forcing ssl on login, be secure on the login page
	if(!$besecure && force_ssl_login() && my_is_login_page())
		$besecure = true;			

    //a hook so we can filter this setting if need be
	$besecure = apply_filters("my_besecure", $besecure);

	if($besecure && (!is_ssl())
	{
		//need to be secure		
		wp_redirect("https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		exit;
	}
	elseif(!$besecure && is_ssl())
	{
		//don't need to be secure		
		wp_redirect("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
		exit;
	}	
}
add_action('wp', 'my_besecure', 2);
add_action('login_init', 'my_besecure', 2);
?>
