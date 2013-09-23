<?php
// list all taxonomies
$taxonomies = get_taxonomies();
echo '<pre>';
print_r( $taxonomies );
echo '</pre>';

// list all taxonomies tied to the post post type that have an available ui
$args = array(
	'public' => 1,
	'show_ui' => 1,
	'object_type' => array( 'post')
);
$taxonomies = get_taxonomies( $args );
echo '<pre>';
print_r( $taxonomies );
echo '</pre>';

// add some new terms for the category and post_tag taxonomies
wp_insert_term( 'Fun',    'post_tag' );
wp_insert_term( 'Boring', 'post_tag' );
wp_insert_term( 'Home',   'category' );
wp_insert_term( 'Work',   'category' );
wp_insert_term( 'School', 'category' );

// get school term id
$term = get_term_by( 'slug', 'school', 'category' );
$term_id = $term->term_id;
echo $term_id;

// add sub terms under the school term
wp_insert_term( 'Math',      'category', array( 'parent' => $term_id ) );
wp_insert_term( 'Science',   'category', array( 'parent' => $term_id ) );
wp_insert_term( 'WordPress', 'category', array( 'parent' => $term_id ) );

// list all terms for the category and post_tag taxonomies
$args = array(
 	'orderby'    => 'count',
 	'hide_empty' => 0
);
$terms = get_terms( $taxonomies, $args );
echo '<pre>';
print_r( $terms );
echo '</pre>';


// get posts - return the latest post
$posts = get_posts( array( 'posts_per_page' => '1', 'orderby' => 'post_date', 'order' => 'DESC' ) );
foreach ( $posts as $post ) {
	$post_id = $post->ID;

	echo $post_id;
}
?>