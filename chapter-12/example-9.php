<?php
echo 'current site id: ' . get_current_blog_id() . '<br>';
switch_to_blog(2);
echo 'new current site id: ' . get_current_blog_id() . '<br>';
restore_current_blog();
echo 'original site id: ' . get_current_blog_id();