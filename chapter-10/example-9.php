<?php
function bwawwp_xmlrpc_getTerm() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    $rpc->query( 'wp.getTerm', 0, $xmlrpc_user, $xmlrpc_pass, 'category', 1 );
    echo '<h1>Term ID 1</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_getTerm', 999 );
?>