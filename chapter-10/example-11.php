<?php
function bwawwp_xmlrpc_getUsers() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    $rpc->query( 'wp.getUsers', 0, $xmlrpc_user, $xmlrpc_pass );
    echo '<h1>Users</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    $filter = array( 'role' => 'administrator' );
    $fields = array( 'username', 'email' );
    $rpc->query( 'wp.getUsers', 
        0, 
        $xmlrpc_user, 
        $xmlrpc_pass, 
        $filter, 
        $fields 
    );
    echo '<h1>Filtered Users</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_getUsers', 999 );
?>