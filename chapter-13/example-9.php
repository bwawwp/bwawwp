<?php
$details = get_blog_details( 1 );
echo '<pre>';
print_r($details);
echo '</pre>';
echo 'This site url is ' . $details->siteurl . ' and it has ' . $details->post_count . ' posts.';
?>