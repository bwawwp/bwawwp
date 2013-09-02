<?php
if ( current_user_can( 'manage_options' ) ) { 
    // has the manage options capability, typically an admin
}

if ( current_user_can( 'edit_user', $user_id ) ) {
    // can edit the user with ID = $user_id. 
    // typically either the user himself or an admin 
}

if ( current_user_can( 'edit_post', $post_id ) ) {
    // can edit the post with ID = $post_id. 
    // typically the author of the post or an admin or editor
}

if ( current_user_can( 'subscriber' ) ) {
    // one way to check if the current user is a subscriber
}
?>