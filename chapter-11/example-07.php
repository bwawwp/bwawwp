<?php
// Register the homework CPT.
register_homework_post_type(
	'homework',
	array(
		'labels' => array(
			'name' => __( 'Homework' ),
			'singular_name' => __( 'Homework' )
		),
		'public' => true,
		'has_archive' => true,
        'supports' => array( 'title', 'editor' ),
        'show_in_rest' => true,
        'template' => array(
            array( 'homework/instructions' ),
            array( 'homework/question',
				array( 'content' => 'True/false 1.',
					   'question_type' => 'true_false'
				)
			),
            array( 'homework/question',
				array( 'content' => 'Essay question.',
					   'question_type' => 'essay'
				)
			),
        )
	)
);