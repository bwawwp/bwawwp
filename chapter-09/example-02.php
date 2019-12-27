<?php
function sp_enqueue_scripts() {
    wp_enqueue_script( 'jquery' );
}
add_action( 'init', 'sp_enqueue_scripts' );
