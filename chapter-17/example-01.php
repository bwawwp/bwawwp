<?php
// Don't do this on a production site that you care about.
function bwawwp_image_library_check(){
	if( extension_loaded('imagick') ) {
	    $imagick = new Imagick();
	    print_r( $imagick->queryFormats() );
	} else {
	    echo 'No ImageMagick!';
	}
	
	if( extension_loaded('gd') ) {
	    print_r( gd_info() );
	} else {
	    echo 'No GD!';
	}
	exit();
}
add_action("init", "bwawwp_image_library_check");