<?php
// add option
$twitters = array( '@bwawwp', '@bmess', '@jason_coleman' );
add_option( 'bwawwp_twitter_accounts', $twitters );

// get option
$bwawwp_twitter_accounts = get_option( 'bwawwp_twitter_accounts' );
echo '<pre>';
print_r( $bwawwp_twitter_accounts );
echo '</pre>';

// update option
$twitters = array_merge( $twitters, array( '@webdevstudios', '@strangerstudios' ) );
update_option( 'bwawwp_twitter_accounts', $twitters );

// get option
$bwawwp_twitter_accounts = get_option( 'bwawwp_twitter_accounts' );
echo '<pre>';
print_r( $bwawwp_twitter_accounts );
echo '</pre>';

// delete option
delete_option( 'bwawwp_twitter_accounts' );


/*
The output from the above example should look something like this:
Array
(
    [0] => @bwawwp
    [1] => @bmess
    [2] => @jason_coleman
)
Array
(
    [0] => @bwawwp
    [1] => @bmess
    [2] => @jason_coleman
    [3] => @webdevstudios
    [4] => @strangerstudios
)
*/
?>
