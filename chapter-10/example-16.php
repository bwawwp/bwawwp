<?php
function bwawwp_xmlrpc_uploadFile() {
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    $rpc = new IXR_CLIENT( $xmlrpc_url );
    // grab an image
    $args = array(
        'post_type' => 'attachment',
        'post_status' => 'any',
        'posts_per_page' => 1,
        'post_mime_type' => 'image/jpeg'
    );
    $posts = get_posts( $args );
    $name = basename( $posts[0]->post_title );
    $type = $posts[0]->post_mime_type;
    $bits = file_get_contents( $posts[0]->guid );
    $data = array(
        'name' => $name,
        'type' => $type,
        'bits' => new IXR_Base64( $bits ),
        'overwrite' => true
    );
    $rpc->query( 'wp.uploadFile', 0, $xmlrpc_user, $xmlrpc_pass, $data );
    echo '<h1>Uploaded File</h1>';
    echo '<pre>';
    print_r( $rpc->getResponse() );
    echo '</pre>';
    exit();
}
add_action( 'init', 'bwawwp_xmlrpc_uploadFile', 999 );
?>