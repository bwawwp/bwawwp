<?php
/*
	Class Wrapper for Homework CPT with Init Function
	/wp-content/plugins/schoolpress/classes/class.homework.php
*/
class Homework
{
	//constructor can take a $post_id
	function __construct($post_id = NULL)
	{
		if(!empty($post_id))
			$this->getPost($post_id);
	}
	
	//get the associated post and prepopulate some properties
	function getPost($post_id)
	{
		/* snipped */
	}
	
	//register CPT and Taxonomies on init
	function init()
	{
		//homework CPT
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
		
		//subject taxonomy
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

//run the Homework init on init
add_action('init', array('Homework', 'init'));
?>
