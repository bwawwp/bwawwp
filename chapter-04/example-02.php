<?php
/*
    Template Name: Hooking Template Example
*/

//what's the main post_id for this page?
global $post, $main_post_id;
$main_post_id = $post->ID;

//use the default page template
require_once(dirname(__FILE__) . "/page.php");

//now add content using a function called during the the_content hook
function template_content($content)
{
    global $post, $main_post_id;
    
    //we don't want to filter posts that aren't the main post
    if($post->ID != $main_post_id)
        return $content;
    
    //capture output
    ob_start();
    ?>
    <p>This content will show up under the page content.</p>
    <?php
    $temp_content = ob_get_contents();
    ob_end_clean();
    
    //append and return template content
    return $content . $temp_content;
}
add_action("the_content", "template_content");
