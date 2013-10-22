<?php
//set headers for our files
$default_headers = array(
	"Title" => "Title",
	"Slug" => "Slug",
	"Version" => "Version"
);

//remember current directory
$cwd = getcwd();

//change to reports directory
$reports_dir = dirname(__FILE__) . "/reports";
chdir($reports_dir);

echo "<pre>";

//loop through .php files in reports directory
foreach (glob("*.php") as $filename) 
{
	$data = get_file_data($filename, $default_headers, "report");
	print_r($data);
}

echo "</pre>";

//change back to the current directory in case someone expects the default
chdir($cwd);
?>
