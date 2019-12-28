<?php
function remove_login_link($classes, $item)
{
	if(is_page('login') && $item->title == 'Login')
    $classes[] = 'hide';	//hide this item

  return $classes;
}
add_filter('nav_menu_css_class', 'sp_nav_menu_css_class', 10, 2);
