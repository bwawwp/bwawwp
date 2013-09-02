<?php
function sp_register_user( $user_id ){
    // get the age value passed into the form
    $age = intval( $_REQUEST['age'] );
    
    // update user meta
    update_user_meta( $user_id, 'age', $age );
}
add_action( 'register_user', 'sp_register_user' );
?>