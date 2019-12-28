<?php
add_filter( 'the_title', 'my_filtered_title', 10, 2 );

function my_filtered_title( $value, $id ) {
	$value = '[' . $value . ']';
	return $value;
}
?>