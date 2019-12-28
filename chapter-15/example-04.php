<?php
//Helper function to check if a user is a plugin customer
function is_plugin_customer($user_id = null)
{
	$plugin_download_id = 184;	//update this

	//default to current user
	if(empty($user_id))
	{
		global $current_user;
		$user_id = $current_user->ID;
	}

	return edd_has_user_purchased($user_id, $plugin_download_id);
}

//Add a support link to primary menu for users who purchased
function add_support_link_to_menu($items, $args)
{
	if($args->theme_location == 'primary' && is_plugin_customer())
	{
		$items .= '<li class="menu-item menu-item-type-post_type 
		                      menu-item-object-page menu-item-support">';
		$items .= '<a href="/support/">Support</a>';
		$items .= '</li>';
	}

	return $items;
}
add_filter('wp_nav_menu_items', 'add_support_link_to_menu', 10, 2);