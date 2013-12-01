<?php
function schoolpress_load_textdomain(){
    //load textdomain from /plugins/schoolpress/languages/
    load_plugin_textdomain( 
    	'schoolpress', 
    	FALSE, 
    	dirname( plugin_basename(__FILE__) ) . '/languages/' 
    );
}
add_action( 'init', 'schoolpress_load_textdomain', 1 );
?>