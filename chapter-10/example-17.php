<?php
function bwawwp_xmlrpc_getPostTypes() {
	$rpc = new IXR_CLIENT( 'http://messenlehner.com/xmlrpc.php' );
	$filter = array( 'public' => 1 );
	$rpc->query( 'wp.getPostTypes', 0, $username, $password, $filter );
	$response = $rpc->getResponse();
	echo '<h1>Post Types</h1>';
	echo '<pre>';
	print_r( $response );
	echo '</pre>';
	exit();
}
add_action( 'init', 'bwawwp_xmlrpc_getPostTypes', 999 );
?>