/*
	Class wrapper for homework CPT with init function
	/wp-content/plugins/schoolpress/classes/class.homework.php
*/
class Homework
{
	// Constructor can take a $post_id.
	function __construct($post_id = NULL)
	{
		if(!empty($post_id))
			$this->getPost($post_id);
	}

	// Get the associated post and prepopulate some properties.
	function getPost($post_id)
	{
		/* snipped */
	}

	// Register CPT and taxonomies on init.
	function init()
	{
		// Register the homework CPT.
		register_post_type(
			'homework',
			array(
				'labels' => array(
					'name' => __( 'Homework' ),
					'singular_name' => __( 'Homework' )
				),
				'public' => true,
				'has_archive' => true,
			)
		);

		// Register the subject taxonomy.
		register_taxonomy(
			 'subject',
			 'homework',
			 array(
			 	'label' => __( 'Subjects' ),
			 	'rewrite' => array( 'slug' => 'subject' ),
			 	'hierarchical' => true
			 )
		);
	}
}

// Run the Homework init on init.
add_action('init', array('Homework', 'init'));