<?php
// simple submission form example
function schoolpress_footer_form(){
	?>
	<form method="post">
	  <?php // create our nonce
	  wp_nonce_field( 'email_list_form', 'email_list_form_nonce' );
	  ?>
	  <h3>Join our email list</h3>
	  Email Address: <input type="text" name="email_address">
	  <input type="submit" name="submit_email" value="Submit" />
	</form>
	<?php
}
add_action( 'wp_footer', 'schoolpress_footer_form' );

// form action
function schoolpress_footer_form_action(){
	if ( isset( $_POST['submit_email'] )
	  && isset( $_POST['email_address'] )
	  && check_admin_referer( 'email_list_form',
	  'email_list_form_nonce' ) ) {
	  echo 'You submitted: ' . esc_html( $_POST['email_address'] );
	  // or process your form here...
	}
}
add_action( 'init', 'schoolpress_footer_form_action' );