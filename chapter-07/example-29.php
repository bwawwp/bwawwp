<?php
//remember current directory
$cwd = getcwd();

//switch to themes directory
$themes_dir = dirname(get_template_directory());
chdir($themes_dir);

echo "<pre>";

//loop through theme directories and print theme info
foreach(glob("*", GLOB_ONLYDIR) as $dir)
{
	$theme = wp_get_theme($dir);
	print_r($theme);
}

echo "</pre>";

//switch back to current directory just in case
chdir($cwd);