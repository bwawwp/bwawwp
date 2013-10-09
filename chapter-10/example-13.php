<?php
function bwawwp_xmlrpc_setOptions() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    $options = array(
        'blog_title' => 'Site Title via XML-RPC',
        'blog_tagline' => 'Just another WordPress site via XML-RPC'
    );
    $rpc->query( 'wp.setOptions', 0, $xmlrpc_user, $xmlrpc_pass, $options );
    echo '<h1>Set Options</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_setOptions', 999 );
?>