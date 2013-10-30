<?php
//require any user account
add_action('wpdoc_caps', function($caps) { return array('read'); });

//require admin account
add_action('wpdoc_caps', function($caps) { return array('manage_options'); });

//authors only or users with a custom capability (doc)
add_action('wpdoc_caps', function($caps) { return array('edit_post', 'doc'); });
?>
