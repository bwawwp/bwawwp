<?php
// function for adding a custom meta box
function schoolpress_homework_add_meta_boxes(){
	
	add_meta_box(
        'homework_meta',
        'Additonal Homework Info',
        'schoolpress_homework_meta_box',
        'homework',
        'side'
    );

}
// use the add_meta_boxes hook to call a custom function to add a new meta box
add_action( 'add_meta_boxes', 'schoolpress_homework_add_meta_boxes' );

// this is the callback function called from add_meta_box
function schoolpress_homework_meta_box( $post ){
	
	// enqueue jquery date picker
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_style('jquery-style',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

	// set meta data if already exists
	$is_required = get_post_meta( $post->ID, '_schoolpress_homework_is_required', 1 );
	$due_date = get_post_meta( $post->ID, '_schoolpress_homework_due_date', 1 );
	// output meta data fields
	?>
	<p>
	<input type="checkbox" name="is_required" value="1" <?php checked( $is_required, '1' ); ?>>
	This assignment is required.
	</p>
	<p>
	Due Date:
	<input type="text" name="due_date" id="due_date" value="<?php echo $due_date;?>">
	</p>
	<?php // attach jquery date picker to our due_date field?>
	<script>
	jQuery(document).ready(function() {
	    jQuery('#due_date').datepicker({
	        dateFormat : 'mm/dd/yy'
	    });
	});
	</script>
	<?php
}

// function for saving custom meta data to the database
function schoolpress_homework_save_post( $post_id ){

  // don't save anything if WP is auto saving
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // check if this is the correct post type and that the user has correct permissions
  if ( 'homework' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
  
  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  // update homework meta data
  update_post_meta( $post_id, '_schoolpress_homework_is_required', $_POST['is_required'] );
  update_post_meta( $post_id, '_schoolpress_homework_due_date', $_POST['due_date'] );

}
// use the save_post hook to call a custom function to handle saving our meta data
add_action( 'save_post', 'schoolpress_homework_save_post' );
?>
