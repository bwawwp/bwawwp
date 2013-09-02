<?php
//create a new "course" CPT when a teacher registers
function sp_user_register( $user_id ){
    // check if the new user is a teacher (see Chapter 15 for details)
    if ( pmpro_hasMembershipLevel( 'teacher', $user_id ) ) {
        // add a new "course" CPT with this user as author
        wp_insert_post( array(
            'post_title' => 'My First Course',
            'post_content' => 'This is a sample course...',
            'post_author' => $user_id,
            'post_status' => 'draft',
            'post_type' => 'course'
            
        ) );
    }
}
add_action( 'user_register', 'sp_user_register' );
?>