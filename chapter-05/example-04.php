<?php
function schoolpress_the_content_homework_submission($content){

	global $post;

	// Don't do this for any other post type than homework
	// and if a user is not logged in
	$current_user = wp_get_current_user();
	if ( ! is_single() || $post->post_type != 'homework' || ! $current_user )
		return $content;

	// check if the current user has already made a submission to this homework assignment
	$submissions = get_posts( array( 
		'post_author'    => $current_user->ID, 
		'posts_per_page' => '1', 
		'post_type'      => 'submissions', 
		'meta_key'       => '_submission_homework_id', 
		'meta_value'     => $post->ID  
	) );
	foreach ( $submissions as $submission ) {
		$submission_id = $submission->ID;
	}

	// Process the form submission if the user hasn't already
	if ( !$submission_id && 
			isset( $_POST['submit-homework-submission'] ) && 
			isset( $_POST['homework-submission'] ) ) {

		$submission = $_POST['homework-submission'];
		$post_title = $post->post_title; 
		$post_title .= ' - Submission by ' . $current_user->display_name;
		// Insert the current users submission as a post into our submissions CPT.
		$args = array(
			'post_title'   => $post_title,
			'post_content' => $submission,
			'post_type'    => 'submissions',
			'post_status'  => 'publish',
			'post_author'  => $current_user->ID
		);
		$submission_id = wp_insert_post( $args );
		// add post meta to tie this submission post to the homework post
		add_post_meta( $submission_id, '_submission_homework_id', $post->ID );
		// create a custom message
		$message = __( 
			'Your homework has been submitted and is awaiting review.', 
			'schoolpress' 
		);
		$message = '<div class="homework-submission-message">' . $message . '</div>';
		// drop message before the filtered $content variable
		$content = $message . $content;
	}

	// Add a link to the user's submission if a submssion was already made
	if( $submission_id ) {

		$message = sprintf( __( 
			'Click %s here %s to view your submission to this homework assignment.',
			'schoolpress' ), 
			'<a href="' . get_permalink( $submission_id ) . '">',
			'</a>' );
		$message = '<div class="homework-submission-link">' . $message . '</div>';
		$content .= $message;
		
	// Add a basic submission form after the $content variable being filtered.
	} else {
		
		ob_start();
		?>
		<h3><?php _e( 'Submit your Homework below!', 'schoolpress' );?></h3>
		<form method="post">
		<?php 
		wp_editor( '', 'homework-submission', array( 'media_buttons' => false ) );
		?>
		<input type="submit" name="submit-homework-submission" value="Submit" />
		</form>
		<?php 
		$form = ob_get_contents();
		ob_end_clean();
		$content .= $form;
	}
	
	return $content;

}
// add a filter on 'the_content' so we can run our custom code to deal with homework submissions
add_filter( 'the_content', 'schoolpress_the_content_homework_submission', 999 );
?>
