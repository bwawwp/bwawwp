<?php
$student = wp_get_current_user(); // return WP_User object for current user
foreach( sp_getAssignmentsByUser( $student->ID ) as $assignment ) {
    sp_printAssignment( $assignment->ID );
}
?>