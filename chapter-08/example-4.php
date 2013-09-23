<?php
add_filter( 'login_errors', create_function( '$a', 'return null;') );
?>