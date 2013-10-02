<?php
function wds_run_multisite_functions(){
	if ( is_multisite() )		
		echo 'Run whatever WordPress Multisite functionality you want!';
}
add_action( 'init' , 'wds_run_multisite_functions' );
?>