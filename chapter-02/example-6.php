<?php
// insert post
$args = array(
	'post_title'   => '5 year anniversary on 9/10/16',
	'post_content' => 'Think of somthing cool to do and make a comment about it!',
	'post_status'  => 'publish'
);
$post_id = wp_insert_post( $args );
echo 'post ID: ' . $post_id . ' - ' . $args['post_title'] . '<br>';

// make comments array
$comments[] = 'Take a trip to South Jersey';
$comments[] = 'Dinner at Taco Bell';
$comments[] = 'Make a baby';

// loop comments array
foreach ( $comments as $comment ) {
	// insert comments
	$commentdata = array(
		'comment_post_ID' => $post_id,
		'comment_content' => $comment,
	);
	$comment_ids[] = wp_insert_comment( $commentdata );
}
echo 'comments:<pre>';
print_r( $comments );
echo '</pre>';

// update comment
$commentarr['comment_ID'] = $comment_ids[0];
$commentarr['comment_content'] = 'Take a trip to Paris, France';
wp_update_comment( $commentarr );

// insert comment - sub comment from parent id
$commentdata = array(
	'comment_post_ID' => $post_id,
	'comment_parent' => $comment_ids[0],
	'comment_content' => 'That is a pretty good idea...',
);
wp_insert_comment( $commentdata );

// get comments - search taco bell
$comments = get_comments( 'search=Taco Bell&number=1' );
foreach ( $comments as $comment ) {
	// insert comment - sub comment of taco bell comment id
	$commentdata = array(
		'comment_post_ID' => $post_id,
		'comment_parent' => $comment->comment_ID,
		'comment_content' => 'Do you want to get smacked up?',
	);
	wp_insert_comment( $commentdata );
}

// get comment - count of comments for this post
$comment_count = get_comments( 'post_id= ' . $post_id . '&count=true' );
echo 'comment count: ' . $comment_count . '<br>';

// get comments - get all comments for this post
$comments = get_comments( 'post_id=' .$post_id );
foreach ( $comments as $comment ) {
	// update 1st comment
	if ( $comment_ids[0] == $comment->comment_ID ) {
		$commentarr = array(
			'comment_ID' => $comment->comment_ID,
			'comment_content' => $comment->comment_content . ' & make a baby!',
		);
		wp_update_comment( $commentarr );
		// delete all other comments
	}else {
		// delete comment
		wp_delete_comment( $comment->comment_ID, true );
	}
}

// get comment - new comment count
$comment_count = get_comments( 'post_id= ' . $post_id . '&count=true' );
echo 'new comment count: ' . $comment_count . '<br>';

// get comment - get best comment
$comment = get_comment( $comment_ids[0] );
echo 'best comment: ' . $comment->comment_content;

/*
The output from the above example should look something like this:
post ID: 91011 - 5 year anniversary on 9/10/16
comments:
Array
(
    [0] => Take a trip to South Jersey
    [1] => Dinner at Taco Bell
    [2] => Make a baby
)
comment count: 5
new comment count: 1
best comment: Take a trip to Paris, France & make a baby!
*/
?>
