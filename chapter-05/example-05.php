<?php
function schoolpress_submissions_template_redirect(){
    global $post, $user_ID;
    
    // only run this function for the submissions post type
    if ( $post->post_type != 'submissions' )
    	return;
    
    // check if post_author is the current user_ID 
    if ( $post->post_author == $user_ID )
    	$no_redirect = true;

    // check if current user is an administrator
    if ( current_user_can( 'manage_options' ) )
    	$no_redirect = true;

    // if $no_redirect is false redirect to the home page
    if ( ! $no_redirect ) {
    	wp_redirect( home_url() );
    	exit();
    }
}
// use the template_redirect hook to call a function that decides if the current
// user can access the current homework submission
add_action( 'template_redirect', 'schoolpress_submissions_template_redirect' );
?>
