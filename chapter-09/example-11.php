<?php
//our JavaScript to send/process from the client side
function hbdemo_wp_footer()
{
?>
<script>
  jQuery(document).ready(function() {    			
		//hook into heartbeat-send: client will send the message 'marco' in the 'client' var inside the data array
		jQuery(document).on('heartbeat-send', function(e, data) {
			console.log('Client: marco');
			data['client'] = 'marco';	//need some data to kick off AJAX call
		});
		
		//hook into heartbeat-tick: client looks for a 'server' var in the data array and logs it to console
		jQuery(document).on('heartbeat-tick', function(e, data) {			
			if(data['server'])
				console.log('Server: ' + data['server']);
		});
				
		//hook into heartbeat-error: in case of error, let's log some stuff
		jQuery(document).on('heartbeat-error', function(e, jqXHR, textStatus, error) {
			console.log('BEGIN ERROR');
			console.log(textStatus);
			console.log(error);			
			console.log('END ERROR');			
		});
	});		
</script>
