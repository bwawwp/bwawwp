<?php
add_filter( 'login_errors', function ( $message ) {
    return "Invalid username or password.";
} );