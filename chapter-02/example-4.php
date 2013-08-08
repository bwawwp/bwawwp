<?php
// insert post - set post status to draft
$args = array(
	'post_title'   => 'Building Web Apps with WordPress',
	'post_excerpt' => 'WordPress as an Application Framework',
	'post_content' => 'WordPress is the key to successful cost effective web solutions in most situations. Build almost anything on top of the WordPress platform. DO IT NOW!!!!',
	'post_status'  => 'draft',
	'post_type'    => 'post',
	'post_author'  => 1,
	'menu_order'   => 0
);
$post_id = wp_insert_post( $args );
echo 'post ID: ' . $post_id . '<br>';

// update post - change post status to publish
$args = array(
	'ID'          => $post_id,
	'post_status' => 'publish'
);
wp_update_post( $args );

// get post - return post data as an object
$post = get_post( $post_id );
echo 'Object Title: ' . $post->post_title . '<br>';

// get post - return post data as an array
$post = get_post( $post_id, ARRAY_A );
echo 'Array Title: ' . $post['post_title'] . '<br>';

// delete post - skip the trash and permanently delete it
wp_delete_post( $post_id, true );

// get posts - return 100 posts
$posts = get_posts( array( 'numberposts' => '100') );
// loop all posts and display the ID & title
foreach ( $posts as $post ) {
	echo $post->ID . ': ' .$post->post_title . '<br>';
}

/*
The output from the above example should look something like this:
post ID: 589
Object Title: Building Web Apps with WordPress
Array Title: Building Web Apps with WordPress
"A list of post IDs and Titles from your install"
*/
?>
