<?php
// echoing a var without localization
?>
<h2><?php echo $title; ?></h2>
<?php
// echoing a var with localization
?>
<h2><?php _e( $title, 'schoolpress' ); ?></h2>