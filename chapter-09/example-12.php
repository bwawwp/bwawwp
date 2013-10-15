<?php
//processing the message on the server
function hbdemo_heartbeat_received($response, $data)
{
    if($data['client'] == 'marco')
		$response['server'] = 'polo';
	
	return $response;
}
add_filter('heartbeat_received', 'hbdemo_heartbeat_received', 10, 2);
?>
