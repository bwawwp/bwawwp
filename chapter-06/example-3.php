<?php
$full_name = trim( $user->first_name . ' ' . $user->last_name );
$full_name = trim( get_user_meta( $user->ID, 'first_name' ) . ' ' . get_user_meta( $user->ID, 'last_name' ) );
?>