<?php
function bwawwp_xmlrpc_getPosts() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    
    // returns all posts of post post_type
    $rpc->query( 'wp.getPosts', 0, $xmlrpc_user, $xmlrpc_pass );
    echo '<h1>posts</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    
    // returns all posts of page post_type (or any specific post type)
    $filter = array( 'post_type' => 'page' );
    $rpc->query( 'wp.getPosts', 0, $xmlrpc_user, $xmlrpc_pass, $filter );
    echo '<h1>pages</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';

    // returns 5 published page titles in abc order
    $filter = array(
        'post_type' => 'page',
        'status' => 'publish',
        'number' => '5',
        'orderby' => 'title',
        'order'   => 'ASC'
    );
    $fields = array( 'post_title' );
    $rpc->query( 'wp.getPosts', 
        0, 
        $xmlrpc_user, 
        $xmlrpc_pass, 
        $filter, 
        $fields 
    );
    echo '<h1>5 published page titles</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';

    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_getPosts', 999 );
?>