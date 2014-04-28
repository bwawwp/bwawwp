<?php
if($class->isTeacher($current_user))
{
   //this is the teacher, show them teacher stuff
   //...
}
elseif($class->isStudent($current_user))
{
    //this is a student in the class, show them student stuff
    //...
}
elseif(is_user_logged_in())
{
    //not logged in, send them to the login form with a redirect back here
    wp_redirect(wp_login_url(get_permalink($class->ID)));
    exit;
}
else
{
    //not a member of this class, redirect them to the invite page
    wp_redirect($class->invite_url);
    exit;
}
