<?php
function schoolpress_load_textdomain() {
  // get the locale
  $locale = apply_filters( 'plugin_locale', 
                            get_locale(), 'schoolpress' );
  $mofile = 'schoolpress-' . $locale . '.mo';

  /*
  Paths to local (plugin) and global (WP) language files.
	 Note: dirname(__FILE__) here changes if this code
  is placed outside the base plugin file.
  */
	 $mofile_local  = dirname( __FILE__ ).'/languages/' . $mofile;
	 $mofile_global = WP_LANG_DIR . '/schoolpress/' . $mofile;

	 // load global first
	 load_textdomain( 'schoolpress', $mofile_global );

	 // load local second
	 load_textdomain( 'schoolpress', $mofile_local );
}
add_action( 'init', 'schoolpress_load_textdomain', 1 );