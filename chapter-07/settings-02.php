<?php
//don't require any caps by default, but allow developers to add checks
$caps = apply_filters('wp_doc_caps', array());

if(!empty($caps))
{
  //guilty until proven innocent
  $hascap = false;
  
  //must be logged in to have any caps at all
  if(is_user_logged_in())
  {
    //make sure the current user has one of the caps
    foreach($caps as $cap)
    {
      if(current_user_can($cap))
      {
        $hascap = true;
        break;  //stop checking
      }
    }
  }
  
  if(!$hascap)
  {
    //don't show them the file
    header('HTTP/1.1 503 Service Unavailable', true, 503);
    echo "HTTP/1.1 503 Service Unavailable";
    exit;
  }
}
?>
