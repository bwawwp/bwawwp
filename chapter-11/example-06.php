<?php
// Only allow certain blocks on homework posts.
function my_allowed_block_types( $allowed_blocks, $post ) {
    if ( $post->post_type == 'homework' ) {
        $allowed_blocks = array(
            'core/block',
            'core/image',
            'core/paragraph',
            'core/heading',
            'core/list',
            'homework/instructions',
            'homework/question',
        );
    }
    return $allowed_blocks;
}
add_filter( 'allowed_block_types', 'my_allowed_block_types', 10, 2);