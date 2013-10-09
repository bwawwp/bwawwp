<?php
function bwawwp_xmlrpc_getTerms() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    $rpc->query( 'wp.getTerms', 0, $xmlrpc_user, $xmlrpc_pass, 'category' );
    echo '<h1>Category Terms</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_getTerms', 999 );
?>