// Deregister instructions on non-homework posts.
wp.domReady( function() {
    if( wp.data.select('core/editor').getCurrentPostType() != 'homework' ) {
        wp.blocks.unregisterBlockType( 'homework/instructions' );
    }
});