<?php
// custom function to register a "homework" post type
function schoolpress_register_post_type_homework() {
    register_post_type( 'homework',
        array(
            'labels' => array(
				'name' => __( 'Homework' ),
				'singular_name' => __( 'Homework' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
}
// call our custom function with the init hook
add_action( 'init', 'schoolpress_register_post_type_homework' );

// custom function to register a "submissions" post type
function schoolpress_register_post_type_submission() {
    register_post_type( 'submissions',
        array(
            'labels' => array(
				'name' => __( 'Submissions' ),
				'singular_name' => __( 'Submission' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
}
// call our custom function with the init hook
add_action( 'init', 'schoolpress_register_post_type_submission' );
?>
