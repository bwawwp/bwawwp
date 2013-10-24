<?php
/*
  Taken from the Widgets API Codex Page at:
  http://codex.wordpress.org/Widgets_API
*/
add_action('widgets_init',
     create_function('', 'return register_widget("My_Widget");')
);
?>
