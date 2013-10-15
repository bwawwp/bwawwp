<?php
//processing the message on the server
function sp_heartbeat_received_assignment_count($response, $data)
{
    //check for assignment post id
    if(!empty($data['schoolpress']['assignment_post_id']))
	{
        $assignment = new Assignment($data['schoolpress']['assignment_post_id']);
        $response['schoolpress']['assignment_count'] = count($assignment->submissions);
    }
	
	return $response;
}
add_filter('heartbeat_received', 'sp_heartbeat_received_assignment_count', 10, 2);
?>
