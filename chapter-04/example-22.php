<?php
function sp_wp_footer_modernizr() {
	wp_enqueue_script(
		'modernizr',
		get_stylesheet_directory_uri() . '/js/modernizr.min.js'
	);?>
	<script>
		//change search inputs to text if unsupported
		if(!Modernizr.inputtypes.search)
			jQuery('input[type=search]').attr('type', 'text');
	</script>
	<?php
}
add_action( 'wp_footer', 'sp_wp_footer_modernizr' );
?>