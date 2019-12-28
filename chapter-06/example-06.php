<?php
// Split assignments into multiple lines when using magic methods.
$user->graduation_year = '2012';
$year = '2012';

//To test if a meta value is empty, set a local variable first.
$year = $user->graduation_year;
if ( empty( $year ) )
    $year = '2012';