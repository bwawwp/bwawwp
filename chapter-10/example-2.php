<?php
function bwawwp_xmlrpc_getUsersBlogs() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    // returns all blogs in a multisite network
    $rpc->query( 'wp.getUsersBlogs', $xmlrpc_user, $xmlrpc_pass );
    echo '<h1>Blogs</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_getUsersBlogs', 999 );
?>