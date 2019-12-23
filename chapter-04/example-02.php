<?php
/*
    Template Name: Hooking Template Example
*/

//use the default page template
require_once(dirname(__FILE__) . "/page.php");

//now add content using a function called during the the_content hook
function template_content($content)
{
    //get the current post in this loop
    global $post;

    //get the post object for the current page
    $queried_object = get_queried_object();

    //we don't want to filter posts that aren't the main post
    if(empty($queried_object) || $queried_object->ID != $post->ID)
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