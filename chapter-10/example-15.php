<?php
function bwawwp_xmlrpc_getMediaLibrary() {
	global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
	$rpc = new IXR_CLIENT( $xmlrpc_url );
	$filter = array( 'number' => '20' );
	$rpc->query( 'wp.getMediaLibrary', 0, $xmlrpc_user, $xmlrpc_pass, $filter );
	echo '<h1>Media Library</h1>';
	echo '<pre>';
	print_r( $rpc->getResponse() );
	echo '</pre>';
	exit();
}
add_action( 'init', 'bwawwp_xmlrpc_getMediaLibrary', 999 );
?>