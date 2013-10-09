<?php
add_action( 'init', 'wds_include_IXR' );
function wds_include_IXR() {
    // You need to include this file in order to use the IXR class.
    require_once ABSPATH . 'wp-includes/class-IXR.php';
    global $xmlrpc_url, $xmlrpc_user, $xmlrpc_pass;
    // Another WordPress site you want to push and pull data from
    $xmlrpc_url = 'http://anotherwordpresssite.com/xmlrpc.php';
    $xmlrpc_user = 'admin'; // Hope you're not using "admin" ;)
    $xmlrpc_pass = 'password'; // Really hope you're not using "password" ;)
}
?>