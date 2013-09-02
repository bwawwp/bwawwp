<?php
// send an email when a user is being deleted
function sp_delete_user( $user_id ){
    $user = get_userdata( $user_id );
    wp_mail( $user->user_email, "You've been deleted.", 'Your account at SchoolPress has been deleted.');
}
// want to be able to get user_email so hook in early
add_action( 'delete_user', 'sp_delete_user' );
?>