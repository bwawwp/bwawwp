<?php
/*
	Plugin Name: BWAWWP Code Examples
*/

/*
	For *some* examples, you should be able to simply include the file here to get it to run.
*/
function bwawwp_init()
{
	//require(dirname(__FILE__) . "/chapter-01/example-01.php");
}
add_action("init", "bwawwp_init");
