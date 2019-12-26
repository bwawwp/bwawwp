<?php
$assignment_id = 1;
$assignment = new Homework($assignment_id);
echo '<pre>';
print_r($assignment);
echo '</pre>';
//Outputs:
/*
Homework Object
(
    [post] => WP_Post Object
        (
            [ID] => 1
            [post_author] => 1
            [post_date] => 2013-03-28 14:53:56
            [post_date_gmt] => 2013-03-28 14:53:56
            [post_content] => This is the assignment...
            [post_title] => Assignment #1
            [post_excerpt] =>
            [post_status] => publish
            [comment_status] => open
            [ping_status] => open
            [post_password] =>
            [post_name] => assignment-1
            [to_ping] =>
            [pinged] =>
            [post_modified] => 2013-03-28 14:53:56
            [post_modified_gmt] => 2013-03-28 14:53:56
            [post_content_filtered] =>
            [post_parent] => 0
            [guid] => http://schoolpress.me/?p=1
            [menu_order] => 0
            [post_type] => homework
            [post_mime_type] =>
            [comment_count] => 3
            [filter] => raw
            [format_content] =>
        )

    [id] => 1
    [post_id] => 1
    [title] => Assignment 1
    [teacher_id] => 1
    [content] => This is the assignment...
    [required] => 1
    [due_date] => 2013-11-05
)
*/