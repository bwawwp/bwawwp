<?php
/*
	Plugin Name: BWAWWP Code Examples
*/

/*
	For *some* examples, you should be able to simply include the file here to get it to run.
*/
function bwawwp_init()
{
	if(!empty($_REQUEST['chapter']) && !empty($_REQUEST['example']))	
		$chapter = preg_replace('[^0-9]', $_REQUEST['chapter']);
		$example = preg_replace('[^0-9]', $_REQUEST['example']);
		require(dirname(__FILE__) . "/chapter-" . $chapter . "/example-" . $example . ".php");
}
add_action("init", "bwawwp_init");
