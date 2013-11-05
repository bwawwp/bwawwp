<?php
function schoolpress_register_taxonomy_for_object_type_homework(){
	register_taxonomy_for_object_type( 'post_tag', 'homework' );
}
add_action( 'init', 'schoolpress_register_taxonomy_for_object_type_homework' );
?>
