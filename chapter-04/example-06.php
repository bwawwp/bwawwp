<?php
//schoolpress/shortcodes/invite-students.php
function sp_invite_students_shortcode($atts, $content=null, $code="")
{			
	//start output buffering
ob_start();						
	
	//look for an invite-students template part in the active theme
	$template = locate_template(“schoolpress/templates/invite-students.php”);
	
	//if not found, use the default
	if(empty($template))
		$template = dirname(__FILE__) . “/../templates/invite-students.php”;

	//load the template
	load_template($template);
	
	//get content from buffer and output it
	$temp_content = ob_get_contents();
	ob_end_clean();
	return $temp_content;			
}
add_shortcode("invite-students", "sp_invite_students_shortcode");
