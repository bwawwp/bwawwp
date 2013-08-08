<?php
// get brian's id
$brian_id = get_user_by( 'login', 'brian' )->ID;

// add user meta - notice 3rd parameter/unique is set to true. no polygamy! only one wife at a time.
add_user_meta( $brian_id, 'bwawwp_wife', 'Robin Jade Morales Messenlehner', true);

// get user meta - returning a single value
$brians_wife = get_user_meta( $brian_id, 'bwawwp_wife', true);
echo "Brian's wife: " . $brians_wife . "<br>";

// add user meta - no 3rd parameter/unique. can have as many kids as wife will let me.
add_user_meta( $brian_id, 'bwawwp_kid', 'Dalya' );
add_user_meta( $brian_id, 'bwawwp_kid', 'Brian' );
add_user_meta( $brian_id, 'bwawwp_kid', 'Nina' );

// update user meta - this will update brian to brian jr.
update_user_meta( $brian_id, 'bwawwp_kid', 'Brian Jr', 'Brian' );

// get user meta - returning an array
$brians_kids = get_user_meta( $brian_id, 'bwawwp_kid' );
echo "Brian's kids:";
echo '<pre>';
print_r($brians_kids);
echo '</pre>';

// delete brian's user meta
delete_user_meta( $brian_id, 'bwawwp_wife' );
delete_user_meta( $brian_id, 'bwawwp_kid' );

// get jason's id
$jason_id = get_user_by( 'login', 'jason' )->ID;

// update user meta - this will create meta if the key doesn't exist for the user.
update_user_meta( $jason_id, 'bwawwp_wife', 'Kimberly Ann Coleman' );

// get user meta - returning an array
$jasons_wife = get_user_meta( $jason_id, 'bwawwp_wife' );
echo "Jason's wife:";
echo '<pre>';
print_r($jasons_wife);
echo '</pre>';

// add user meta - storing as an array
add_user_meta( $jason_id, 'bwawwp_kid', array( 'Isaac', 'Marin' ) );

// get user meta - returning a single value which happens to be an array.
$jasons_kids = get_user_meta( $jason_id, 'bwawwp_kid', true );
echo "Jason's kids:";
echo '<pre>';
print_r($jasons_kids);
echo '</pre>';

// delete jason's user meta
delete_user_meta( $jason_id, 'bwawwp_wife' );
delete_user_meta( $jason_id, 'bwawwp_kid' );

/*
The output from the above example should look something like this:
Brian's wife: Robin Jade Morales Messenlehner
Brian's kids:
Array
(
    [0] => Dalya
    [1] => Brian Jr
    [2] => Nina
)
Jason's wife:
Array
(
    [0] => Kimberly Ann Coleman
)
Jason's kids:
Array
(
    [0] => Isaac
    [1] => Marin
)
*/
?>
