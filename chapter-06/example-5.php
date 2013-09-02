<?php
// dump all meta data for a user
$user_meta = get_user_meta( $user_id );
foreach( $user_meta as $key => $value )
    echo $key . ': ' . $value . '<br />';
?>