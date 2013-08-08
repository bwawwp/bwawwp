<?php
// get posts - return the latest post
$posts = get_posts( array( 'numberposts' => '1', 'orderby' => 'post_date', 'order' => 'DESC' ) );
foreach ( $posts as $post ) {
	$post_id = $post->ID;

	// update post meta - creates 2 post meta records
	update_post_meta( $post_id, '_bwawwp_hidden_field', 'You SHOULD NOT see this in the custom fields section when editing your latest post.' );
	update_post_meta( $post_id, 'bwawwp_displayed_field', 'You SHOULD see this in the custom fields section when editing your latest post.' );

	// array of student logins
	$students[] = 'dalya';
	$students[] = 'ashleigh';
	$students[] = 'lola';
	$students[] = 'isaac';
	$students[] = 'marin';
	$students[] = 'brian';
	$students[] = 'nina';

	// add post meta - one key with array as value, array will be serialized automatically
	add_post_meta( $post_id, 'bwawwp_students', $students, true );

	// loop students and add post meta record for each student
	foreach ( $students as $student ) {
		add_post_meta( $post_id, 'bwawwp_student', $student );
	}

	// get post meta - get all meta keys
	$all_meta = get_post_meta( $post_id );
	echo '<pre>';
	print_r( $all_meta );
	echo '</pre>';

	// get post meta - get 1st instance of key
	$student = get_post_meta( $post_id, 'bwawwp_student', true );
	echo 'oldest student: ' . $student;

	// delete post meta
	delete_post_meta( $post_id, 'bwawwp_student' );
}

/*
The output from the above example should look something like this:
Array
(
    [_bwawwp_hidden_field] => Array
        (
            [0] => You SHOULD NOT see this in the custom fields section when editing your latest post.
        )

    [bwawwp_displayed_field] => Array
        (
            [0] => You SHOULD see this in the custom fields section when editing your latest post.
        )

    [bwawwp_students] => Array
        (
            [0] => a:7:{i:0;s:5:"dalya";i:1;s:8:"ashleigh";i:2;s:4:"lola";i:3;s:5:"isaac";i:4;s:5:"marin";i:5;s:5:"brian";i:6;s:4:"nina";}
        )

    [bwawwp_student] => Array
        (
            [0] => dalya
            [1] => ashleigh
            [2] => lola
            [3] => isaac
            [4] => marin
            [5] => brian
            [6] => nina
        )
)
oldest student: dalya
*/
?>
