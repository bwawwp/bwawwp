<?php
//add a SchoolPress menu with reports page
function sp_admin_menu()
{
    add_menu_page('SchoolPress', 'SchoolPress', 'manage_options', 'sp_reports', ‘sp_reports_page’);
}
add_action('admin_menu', ‘sp_admin_menu’);


//function to load admin page
function sp_reports_page()
{
	require_once(dirname(__FILE__) . "/adminpages/reports.php");
}
