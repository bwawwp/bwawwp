<?php
// get comments - last comment ID
$comments = get_comments( 'number=1' );
foreach ( $comments as $comment ) {
	$comment_id = $comment->comment_ID;

	// add comment meta - meta for view date & ip address
	$viewed = array( date( "m.d.y" ), $_SERVER["REMOTE_ADDR"] );
	$comment_meta_id = add_comment_meta( $comment_id, 'bwawwp_view_date', $viewed, true );
	echo 'comment meta id: ' . $comment_meta_id;

	// update comment meta - change date format to fomrat like 
	// October 23, 2020, 12:00 am instead of 10.23.20
	$viewed = array( date( "F j, Y, g:i a" ), $_SERVER["REMOTE_ADDR"] );
	update_comment_meta( $comment_id, 'bwawwp_view_date', $viewed );

	// get comment meta - all keys
	$comment_meta = get_comment_meta( $comment_id );
	echo '<pre>';
	print_r( $comment_meta );
	echo '</pre>';

	// delete comment meta
	delete_comment_meta( $comment_id, 'bwawwp_view_date' );
}

/*
The output from the above example should look something like this:
comment meta id: 16
Array
(
    [bwawwp_view_date] => Array
        (
            [0] => a:2:{i:0;s:24:"August 11, 2013, 4:16 pm";i:1;s:9:"127.0.0.1";}
        )

)
*/
?>
