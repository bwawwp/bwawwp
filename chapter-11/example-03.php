<?php
register_post_type(
	'homework',
	array(
		'labels' => array(
			'name' => __( 'Homework' ),
			'singular_name' => __( 'Homework' )
		),
		'public' => true,
		'has_archive' => true,
        'supports' => array( 'title', 'editor' ), // New
        'show_in_rest' => true,          // New
	)
);