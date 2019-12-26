<?php
function sp_profile_update( $user_id ){
    //make sure the current user can edit this user
    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }

    // check if value has been posted
    if ( isset( $_POST['age'] ) ){
        // update user meta
        update_user_meta( $user_id, 'age', intval( $_POST['age'] ) );
    }
}
// user's own profile
add_action( 'personal_options_update', 'sp_profile_update' );
// admins editing
add_action( 'edit_user_profile_update', 'sp_profile_update' );