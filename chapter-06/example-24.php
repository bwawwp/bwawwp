<?php
class Student extends WP_User {
    // no constructor so WP_User's constructor is used
    
    // method to get assignments for this Student
    function getAssignments() {
        // get assignments via get_posts if we haven't yet
        if ( ! isset( $this->data->assignments ) )
            $this->data->assignments = get_posts( array(
                'post_type' => 'assignment',    // assignments
                'numberposts' => -1,            // all posts
                'author' => $this->ID           // user ID for this Student
            ));
        
        return $this->data->assignments;
    }
    
    // magic method to detect $student->assignments
    function __get( $key ){
        if ( $key == 'assignments' )
            return $this->getAssignments();
        else
            return parent::__get( $key ); // fallback to default WP_User magic method
    }    
}
?>