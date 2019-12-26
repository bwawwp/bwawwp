<?php
function sp_roles_and_caps() {
    // Office Manager Role
    remove_role('office');      // in case we updated the caps below
    add_role( 'office', 'Office Manager', array(
    	'read' => true,
    	'create_users' => true,
    	'delete_users' => true,
    	'edit_users' => true,
    	'list_users' => true,
    	'promote_users' => true,
    	'remove_users' => true,
        'office_report' => true // new cap for our custom report
    ));
}
// run this function on plugin activation
register_activation_hook( __FILE__, 'sp_roles_and_caps' );
