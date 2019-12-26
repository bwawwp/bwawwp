<?php
// arrays will get serialized
$children = array( 'Isaac', 'Marin');
update_user_meta( $user_id, 'children', $children );

// you can also store an array by storing multiple values with the same key
add_user_meta( $user_id, 'children', 'Isaac' );
add_user_meta( $user_id, 'children', 'Marin' );

// when storing multiple values, specify the $prev_value parameter
// to select which one changes
update_user_meta( $user_id, 'children', 'Isaac Ford', 'Isaac' );
update_user_meta( $user_id, 'children', 'Marin Josephine', 'Marin' );

//delete all user meta by key
delete_user_meta( $user_id, 'children' );

//delete just one row when there are multiple values for one key
delete_user_meta( $user_id, 'children', 'Isaac Ford' );
