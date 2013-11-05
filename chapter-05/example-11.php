<?php
//static function of Student class to check if the current user is a student
if(Student::is_student())
{
	//student defaults to current user
	$student = new Student();
	
	//let's figure out when their next assignment is due
	$assignment = $student->getNextAssignment();
	
	//display info and links
	if(!empty($assignment))
	{
	?>
	<p>Your next assignment <a href="<?php echo get_permalink($assignment->id);?>"><?php echo $assignment->title;?></a>
	for the <a href="<?php echo get_permalink($assignment->class_id);?>"><?php echo $assignment->class->title;?></a>
	class is due on <?php echo $assignment->getDueDate();?>.</p>
	<?php
	}
}
?>
