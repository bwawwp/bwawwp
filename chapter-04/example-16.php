<?php
if ( is_user_logged_in() ) {
     wp_nav_menu( array( 'theme_location' => 'logged-in-menu' ) );
} else {
     wp_nav_menu( array( 'theme_location' => 'logged-out-menu' ) );
}
