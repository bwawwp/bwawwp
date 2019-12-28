<?php
// Callback for adding a custom meta box.
function schoolpress_homework_add_meta_boxes(){

    add_meta_box(
        'homework_meta',
        'Additonal Homework Info',
        'schoolpress_homework_meta_box',
        'homework',
        'side'
    );

}
// Use the add_meta_boxes hook to call a custom function to add a new meta box.
add_action( 'add_meta_boxes', 'schoolpress_homework_add_meta_boxes' );

// This is the callback function called from add_meta_box.
function schoolpress_homework_meta_box( $post ){
    // Using 2 liens here so the url will fit in the book ;)
    $smoothness_url = 'http://ajax.googleapis.com/ajax/libs/';
    $smoothness_url.= 'jqueryui/1.12.1/themes/smoothness/jquery-ui.css';

    // Enqueue jquery date picker.
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_style( 'jquery-style', $smoothness_url );

    // Set metadata if already exists.
    $is_required = get_post_meta( $post->ID,
        '_schoolpress_homework_is_required', 1 );

    $due_date = get_post_meta( $post->ID,
        '_schoolpress_homework_due_date', 1 );
    // Output metadata fields.
    ?>
    <p>
    <input type="checkbox"
    name="is_required" value="1" <?php checked( $is_required, '1' ); ?>>
    This assignment is required.
    </p>
    <p>
    Due Date:
    <input type="text"
    name="due_date" id="due_date" value="<?php echo $due_date;?>">
    </p>
    <script>
    // Attach jQuery date picker to our due_date field.
    jQuery(document).ready(function() {
        jQuery('#due_date').datepicker({
            dateFormat : 'mm/dd/yy'
        });
    });
    </script>
    <?php
}

// Callback for saving custom metadata to the database.
function schoolpress_homework_save_post( $post_id ){

  // Don't save anything if WP is auto saving.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return $post_id;

  // Check if correct post type and that the user has correct permissions.
  if ( 'homework' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;

  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  // Update homework metadata.
  update_post_meta( $post_id,
    '_schoolpress_homework_is_required',
    $_POST['is_required']
  );
  update_post_meta( $post_id,
    '_schoolpress_homework_due_date',
    $_POST['due_date']
  );

}
// Call a custom function to handle saving our metadata.
add_action( 'save_post', 'schoolpress_homework_save_post' );
?>