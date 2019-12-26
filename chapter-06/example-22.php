<?php
// Student is a class that extends WP_User
$student = new Student();
foreach( $student->getAssignments() as $assignment ) {
	// assignment here is an instance of a class that extends WP_Post
    $assignment->print();
}