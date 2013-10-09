<?php
function bwawwp_xmlrpc_getTaxonomies() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    $rpc->query( 'wp.getTaxonomies', 0, $xmlrpc_user, $xmlrpc_pass );
    echo '<h1>Taxonomies</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_getTaxonomies', 999 );
?>