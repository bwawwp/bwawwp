<?php
//must include this file
require_once(ABSPATH . "wp-admin/includes/plugin.php");
	
//remember current directory
$cwd = getcwd();

//switch to themes directory
$plugins_dir = ABSPATH . "wp-content/plugins";
chdir($plugins_dir);

echo "<pre>";

//loop through theme directories and print theme info
foreach(glob("*", GLOB_ONLYDIR) as $dir)
{
	$plugin = get_plugin_data($plugins_dir . "/" . $dir . "/" . $dir . ".php", false, false);
	print_r($plugin);
}

echo "</pre>";

//switch back to current directory just in case
chdir($cwd);
?>
