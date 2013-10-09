<?php
function bwawwp_xmlrpc_getPost() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    $method = 'wp.getPost';
    // return last post to get a post ID
    $filter = array( 'number' => '1', 'orderby' => 'date', 'order' => 'DESC' );
    $fields = array( 'post_id' );
    $rpc->query( 'wp.getPosts', 0, $xmlrpc_user, $xmlrpc_pass, $filter, $fields );
    $response = $rpc->getResponse();
    $post_id = $response[0]['post_id'];
    // return all data on last $post_id
    $rpc->query( 'wp.getPost', 0, $xmlrpc_user, $xmlrpc_pass, $post_id );
    echo '<h1>Post ID: '.$post_id.'</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_getPost', 999 );
?>