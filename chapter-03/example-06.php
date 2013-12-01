<?php
// preheader
function sp_stub_preheader() {
	if ( !is_admin() ) {
		global $post, $current_user;
		if ( !empty( $post->post_content )
			&& strpos( $post->post_content, "[sp_stub]" ) !== false ) {
			/*
				Put your preheader code here.
			*/
		}
	}
}
add_action( 'wp', 'sp_stub_preheader', 1 );

// shortcode [sp_stub]
function sp_stub_shortcode() {
	ob_start();
	?>
	Place your HTML/etc code here.
	<?php
	$temp_content = ob_get_contents();
	ob_end_clean();
	return $temp_content;
}
add_shortcode( 'sp_stub', 'sp_stub_shortcode' );
?>