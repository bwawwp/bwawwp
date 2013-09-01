<?php
// custom function to register the "subject" taxonomy
function schoolpress_register_taxonomy_subject() {
   register_taxonomy(
      'subject',
      'homework',
      array(
         'label' => __( 'Subjects' ),
         'rewrite' => array( 'slug' => 'subject' ),
         'hierarchical' => true
      )
   );
}
// call our custom function with the init hook
add_action( 'init', 'schoolpress_register_taxonomy_subject' );
?>