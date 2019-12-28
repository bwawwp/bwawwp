<?php
function my_pmpro_after_change_membership_level($level_id, $user_id)
{
  if($level_id == 1)
	{
		//New member of level #1.
    //If they are a subscriber, make them an author.
		$wp_user_object = new WP_User($user_id);
		if(in_array('subscriber', $wp_user_object->roles))
			$wp_user_object->set_role('author');
	}
	else
	{
		//Not a member of level #1.
    //If they are an author, make them a subscriber.
		$wp_user_object = new WP_User($user_id);
		if(in_array('author', $wp_user_object->roles))
			$wp_user_object->set_role('subscriber');
	}
}
add_action(
    'pmpro_after_change_membership_level',
    'my_pmpro_after_change_membership_level',
    10,
    2
);