<?php
// this will update a user's email and leave other values alone
$userdata = array( 'ID' => 1, 'user_email' => 'jason@strangerstudios.com' );
wp_update_user( $userdata );

// this function is also perfect for updating multiple user meta fields at once
wp_update_user( array(
    'ID' => 1,
    'company' => 'Stranger Studios',
    'title' => 'CEO',
    'personality' => 'crescent fresh'
));