<?php
/**
 * Plugin Name: Minimal Block Example
 */
function enqueue_min_block() {
	wp_enqueue_script(
		'minimal-block',
		plugins_url( 'block.js', __FILE__ ),
		array( 'wp-blocks' )
	);
}
add_action( 'enqueue_block_editor_assets', 'enqueue_min_block' );