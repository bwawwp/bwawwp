<?php
// I want to make sure we really delete the user.
if ( is_multisite() )
    wp_delete_user( $user_id );
else
    wpmu_delete_user( $user_id );
?>