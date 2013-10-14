<?php
class SPClass()
{
	/* ... constructor and other methods ... */

	function getStudents()
	{
		/* ... gets all users within the BuddyPress group for this class … */

		return $this->students;	//array of student objects
	}

	function getAssignmentAverages()
	{
		//check for transient
$this->assignment_averages = get_transient('class_assignment_averages_' . $this->ID);
		
		//no transient found? compute the averages
		if(empty($this->assignment_averages))
		{
			$this->assignment_averages = array();
			$this->getStudents();
			
			foreach($this->students as $student)
			{
				$this->assignment_averages[$student->ID] = $student->getAssignmentAverages();
			}

			//save in transient
			set_transient('class_assignment_averages_' . $this->ID, $this->assignment_averages);
		}

		//return the averages
		return $this->assignment_averages;
	}
}

//clear assignment averages transients when an assignment is graded
public function clear_assignment_averages_transient($assignment_id)
{
	//which class is this assignment for
	$assignment = new Assignment($assignment_id);
	$class_id = $assignment->class_id;    //stored as postmeta on the assignment post
	
	//clear any assignment averages transient for this class
delete_transient('class_assignment_averages_' . $class_id);
}
add_action('sp_update_assignment_score', array('SPClass', 'clear_assignment_averages_transient'));
?>
