<?php
add_action('widgets_init',
     create_function('', 'return register_widget("My_Widget");')
);
?>
