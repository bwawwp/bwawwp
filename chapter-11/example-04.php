<?php
// Add a Homework block category.
function my_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'homework',
				'title' => 'Homework',
			),
		)
	);
}
add_filter( 'block_categories', 'my_block_categories' ), 10, 2 );