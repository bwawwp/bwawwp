<?php
// insert user
$userdata = array(
	'user_login'    => 'brian',
	'user_pass'     => 'KO03gT7@n*',
	'user_nicename' => 'Brian',
	'user_url'      => 'http://webdevstudios.com/',
	'user_email'    => 'brian@schoolpress.me',
	'display_name'  => 'Brian',
	'nickname'      => 'Brian',
	'first_name'    => 'Brian',
	'last_name'     => 'Messenlehner',
	'description'   => 'This is a SchoolPress Administrator account.',
	'role'          => 'administrator'
);
wp_insert_user( $userdata );

// create users
wp_create_user( 'jason', 'YR529G%*v@', 'jason@schoolpress.me' );

// get user by login
$user = get_user_by( 'login', 'brian' );
echo 'email: ' . $user->user_email  . ' / ID: ' . $user->ID . '<br>';
echo 'Hi: ' . $user->first_name . ' ' . $user->last_name . '<br>';

// get user by email
$user = get_user_by( 'email', 'jason@schoolpress.me' );
echo 'username: ' . $user->user_login . ' / ID: ' . $user->ID . '<br>';

// update user - add first and last name to brian and change role to admin
$userdata = array(
	'ID'         => $user->ID,
	'first_name' => 'Jason',
	'last_name'  => 'Coleman',
	'user_url'   => 'http://strangerstudios.com/',
	'role'       => 'administrator'
);
wp_update_user( $userdata );

// get userdata for brian
$user = get_userdata( $user->ID );
echo 'Hi: ' . $user->first_name . ' ' . $user->last_name . '<br>';

// delete user - lets delete the original admin and set their posts to our new admin
// wp_delete_user( 1, $user->ID );

/*
The output from the above example should look something like this:
email: brian@schoolpress.me / ID: 2
Hi: Brian Messenlehner
username: jason / ID: 3
Hi: Jason Coleman
*/
?>
