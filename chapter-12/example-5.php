<?php
function wds_show_blog_id(){
    global $blog_id;
	echo 'current site id: ' . $blog_id;
}
add_action( 'init', 'wds_show_blog_id' );