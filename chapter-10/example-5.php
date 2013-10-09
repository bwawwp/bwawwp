<?php
function bwawwp_xmlrpc_newPost() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    // create an array with post data
    $content = array(
        'post_title' => 'New Post with XML-RPC'
    );
    $rpc->query( 'wp.newPost', 0, $xmlrpc_user, $xmlrpc_pass, $content );
    $post_id = $rpc->getResponse();
    echo '<h1>New Post ID: '. $post_id .'</h1>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_newPost', 999 );
?>