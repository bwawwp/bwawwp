<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		the_title( '<h2>', '</h2>' );
		the_content();
	}
} else {
	// show a message like sorry no posts!
}
?>