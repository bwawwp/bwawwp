<?php
/*
    Output comments for the current post,
    highlighting anyone who has capabilities to edit it.
*/
global $post;   // current post we are looking at

$comments = get_comments( 'post_id=' . $post->ID );
foreach( $comments as $comment ){
    // default CSS classes for all comments
    $classes = 'comment';
    
    // add can-edit CSS class to authors
    if ( user_can( $comment->user_id, 'edit_post', $post->ID ) )
        $classes .= ' can-edit';
?>
<div id="comment-<?php echo $comment->comment_ID;?>" 
    class="<?php echo $classes;?>">
    Comment by <?php echo $comment->comment_author;?>:
    <?php echo wpautop( $comment->comment_content );?>
</div>
<?php
}
?>