<?php
//Add rule and flush on activation.
function sp_activation()
{
	add_rewrite_rule(
	  '/contact/([^/]+)/?',
	  'index.php?name=contact&subject=' . $matches[1],
	  'top'
	);
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'sp_activation');

/*
  Add rule on init in case another plugin flushes,
  but don't flush cause it's expensive
*/
function sp_init()
{
	add_rewrite_rule(
	  '/contact/([^/]+)/?',
	  'index.php?name=contact&subject=' . $matches[1],
	  'top'
	);
}
add_action('init', 'sp_init');

//Flush rewrite rules on deactivation to remove our rule.
function sp_deactivation()
{
	flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'sp_deactivation');