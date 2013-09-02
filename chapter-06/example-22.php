<?php
$student = new Student();   // Student is a class that extends WP_User
foreach( $student->getAssignments() as $assignment ) {
    $assignment->print();   // assignment here is an instance of a class that extends WP_Post
}
?>