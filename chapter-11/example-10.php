<?php
wp_register_script(
    'homework-question',
    BWAWWP_URL . 'homework-cpt/blocks/question/blocks.js',
    array( 'wp-blocks',
		   'wp-element',
		   'wp-editor',
		   'wp-components',
		   'wp-dom-ready',
		   'wp-edit-post',
	),
    filemtime( BWAWWP_DIR . 'homework-cpt/blocks/question/blocks.js' )
);