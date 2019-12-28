<?php
function load_template( $_template_file, $require_once = true ) {
	global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite;
	global $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

	if ( is_array( $wp_query->query_vars ) )
		extract( $wp_query->query_vars, EXTR_SKIP );

  	if ( isset( $s ) )
		$s = esc_attr( $s );

	if ( $require_once )
		require_once( $_template_file );
	else
		require( $_template_file );
}
?>