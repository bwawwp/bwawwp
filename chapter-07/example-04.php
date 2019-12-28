<?php 
//make a copy of the original shortcodes
global $shortcode_tags;
$original_shortcode_tags = $shortcode_tags;

//remove the [msg] shortcode
unset($shortcode_tags['msg']);

//do shortcodes and echo
$content = do_shortcode($content);
echo $content;

//restore the original shortcodes
$shortcode_tags = $original_shortcode_tags;