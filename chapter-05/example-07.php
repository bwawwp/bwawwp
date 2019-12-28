<?php
/*
    Class wrapper for homework CPT
    /wp-content/plugins/schoolpress/classes/class.homework.php
*/
class Homework {
    // Constructor can take a $post_id.
    function __construct( $post_id = NULL ) {
        if ( !empty( $post_id ) )
            $this->getPost( $post_id );
    }

    // Get the associated post and prepopulate some properties.
    function getPost( $post_id ) {
        //get post
        $this->post = get_post( $post_id );

        //set some properties for easy access
        if ( !empty( $this->post ) ) {
        $this->id = $this->post->ID;
        $this->post_id = $this->post->ID;
        $this->title = $this->post->post_title;
        $this->teacher_id = $this->post->post_author;
        $this->content = $this->post->post_content;
        $this->required = $this->post->_schoolpress_homework_is_required;
        $this->due_date = $this->post->due_date;
        }

        // Return post id if found or false if not.
        if ( !empty( $this->id ) )
            return $this->id;
        else
            return false;
    }
}
?>