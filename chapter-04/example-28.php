<?php
// load our stylesheet
wp_enqueue_style( 
	'bootstrap', 
	get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css', 
	'style', 
	'3.0' 
);

// and this shows up in the head section of the site (note the 3.0)
/*
<link rel='stylesheet' 
id='bootstrap-css'  
href='/wp-content/themes/startbox-child/bootstrap/css/bootstrap.min.css?ver=3.0' 
type='text/css' 
media='all' />
*/
