<?php
function upgradeSubscriberToAuthor( $user_id ) {
    $user = new WP_User( $user_id );
    if ( in_array( 'subscriber', $user->roles ) )
	    $user->set_role( 'author' );
}
?>