<?php
function bwawwp_xmlrpc_deletePost() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    // return last post to get a post ID
    $filter = array( 'number' => '1', 'orderby' => 'date', 'order' => 'DESC' );
    $fields = array( 'post_id' );
    $rpc->query( 'wp.getPosts', 0, $xmlrpc_user, $xmlrpc_pass, $filter, $fields );
    $response = $rpc->getResponse();
    $post_id = $response[0]['post_id'];
    // delete post by $post_id
    $rpc->query( 'wp.deletePost', 0, $xmlrpc_user, $xmlrpc_pass, $post_id );
    echo '<h1>Deleted Post ID: '. $post_id .'</h1>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_deletePost', 999 );
?>