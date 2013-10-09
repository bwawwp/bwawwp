<?php
function bwawwp_xmlrpc_getOptions() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    $rpc->query( 'wp.getOptions', 0, $xmlrpc_user, $xmlrpc_pass );
    echo '<h1>All Options</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    $options = array( 'blog_url', 'template' );
    $rpc->query( 'wp.getOptions', 0, $xmlrpc_user, $xmlrpc_pass, $options );
    echo '<h1>Filter 2 Options</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_getOptions', 999 );
?>