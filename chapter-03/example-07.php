<?php 
if ( have_posts() ) {
while ( have_posts() ) {
		the_post(); 
		// show each post title, excerpt/content , featured image and more
		the_title( '<h2>', '</h2>' );
the_content();
	}
} else {
// show a message like sorry no posts!
}
?>
