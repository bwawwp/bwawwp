<?php
class Homework
{
	/* Snipped constructor and other methods from earlier examples */
	
	/*
		Get related submissions.
		Set $force to true to force the method to get children again.
	*/
	function getSubmissions($force = false)
	{
		//need a post ID to do this
		if(empty($this->id))
			return array();
		
		//did we get them already?
		if(!empty($this->submissions) && !$force)
			return $this->submissions;
			
		//okay get submissions
		$this->submissions = get_children(array(
			'post_parent' => $this->id,
			'post_type' => 'submissions',
			'post_status' => 'published'
		));
		
		//make sure submissions is an array at least
		if(empty($this->submissions))
			$this->submissions = array();
		
		return $this->submissions;
	}
	
	/*
		Calculate a grade curve
	*/
	function doFlatCurve($maxscore = 100)
	{
		$this->getSubmissions();
		
		//figure out the highest score
		$highscore = 0;
		foreach($this->submissions as $submission)
		{
			$highscore = max($submission->score, $highscore);
		}
		
		//figure out the curve
		$curve = $maxscore - $highscore;
		
		//fix lower scores
		foreach($this->submissions as $submission)
		{
			update_post_meta($submission->ID, "score", min($maxscore, $submission->score + $curve));
		}
	}
}
?>
