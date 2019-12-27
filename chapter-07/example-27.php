<?php
//Update from email and name
function sp_wp_mail_from($from_email)
{
  return 'info@schoolpress.me';
}
function sp_wp_mail_from_name($from_name)
{
  return 'SchoolPress';
}
add_filter('wp_mail_from', 'sp_wp_mail_from');
add_filter('wp_mail_from_name', 'sp_wp_mail_from_name');

//send HTML emails instead of plain text
function sp_wp_mail_content_type( $content_type )
{
  if( $content_type == 'text/plain')
  {
    $content_type = 'text/html';
  }
  return $content_type;
}
add_filter('wp_mail_content_type', 'sp_wp_mail_content_type');

//add a header and footer from files in the active theme
function sp_wp_mail_header_footer($email)
{
  //get header
  $headerfile = get_stylesheet_directory() . "email_header.html";
  if(file_exists($headerfile))
    $header = file_get_contents($headerfile);
  else
    $header = "";

  //get footer
  $footerfile = get_stylesheet_directory() . "email_footer.html";
  if(file_exists($footerfile))
    $footer = file_get_contents($footerfile);
  else
    $footer = "";

  //update message
  $email['message'] = $header . $email['message'] . $footer;

  return $email;
}
add_filter('wp_mail', 'sp_wp_mail_header_footer');