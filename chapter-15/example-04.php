<?php
function my_is_login_page() 
{
	return (in_array(
		$GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php')) ||
		is_page("login")
	);
}
?>
