<?php
$details = get_blog_details( 1 );
echo '<pre>';
print_r($details);
echo '</pre>';
echo 'Site URL:' . $details->siteurl;
echo 'Post Count:' . $details->post_count;
?>