<?php
function bwawwp_xmlrpc_editPost() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    // return last post to get a post ID
    $filter = array( 'number' => '1', 'orderby' => 'date', 'order' => 'DESC' );
    $fields = array( 'post_id' );
    $rpc->query( 'wp.getPosts', 
        0, 
        $xmlrpc_user, 
        $xmlrpc_pass, 
        $filter, 
        $fields 
    );
    $response = $rpc->getResponse();
    $post_id = $response[0]['post_id'];
    // create an array with new post data
    $content = array(
        'post_title' => 'Updated Post with XML-RPC',
        'post_status' => 'publish'
    );
    $rpc->query( 'wp.editPost', 
        0, 
        $xmlrpc_user, 
        $xmlrpc_pass, 
        $post_id, 
        $content 
    );
    echo '<h1>Updated Post ID: '. $post_id .'</h1>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_editPost', 999 );
?>