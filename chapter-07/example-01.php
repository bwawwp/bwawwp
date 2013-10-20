<?php
/*
  shortcode callback for [msg] shortcode
  Example: [msg type="error"]This is an error message.[/msg]
  Output: <div class="message message-error"><p>This is an error message.</p></div>
*/
function sp_msg_shortcode($atts, $content) 
{
  //default attributes
  extract( shortcode_atts( array(
		'type' => 'information',
	), $atts ) );

  return '<div class="message message-' . $type . '"><p>" . $content . "</p></div>";
}
add_shortcode('msg', 'sp_msg_shortcode');
?>
