<?php
function sp_wp_footer_modernizer() {
	wp_enqueue_script( 
		'modernizer', 
		get_stylesheet_directory_uri() . '/js/modernizer.min.js' 
	);?>
	<script>
		//change search inputs to text if unsupported
		if(!Modernizr.inputtypes.search)
			jQuery('input[type=search]').attr('type', 'text');
	</script>
	<?php
}
add_action( 'wp_footer', 'sp_wp_footer_modernizer' );
?>