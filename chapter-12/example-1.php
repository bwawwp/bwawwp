<?php
add_action( 'init', 'schoolpress_maxmind' );
function schoolpress_maxmind(){
    
    // Omni service code is 'e'
    $service = 'e';
    // MaxMind Licence Key
    $key = 'sELZl0ELZMrx97T'; // This is a fake key, get your own!
    
    // Build an array of the licence key and the ip address of the end user
    $params = getopt( 'l:i:' );
    if ( !isset( $params['l'] ) ) $params['l'] = $key;
    $ip = $_SERVER['REMOTE_ADDR'];
    if ( !isset( $params['i'] ) ) $params['i'] = $ip;

    /*
    $params should be an array siumlar to:
    Array
    (
        [l] => sELZl0ELZMrx97T
        [i] => 96.234.61.86
    )
    */

    // MaxMind request URL
    $query = 'https://geoip.maxmind.com/' . $service . '?' . http_build_query( $params );
    // Get response from the URL
    $response = wp_remote_get( $query );
    $results = $response['body'];
    // Turn response into array to easily grab what we need
    $results = explode(',', $results);

    echo '<pre>';
    print_r($results);
    echo '</pre>';
    exit();

    /*
    $results should be an array simular to:
    Array
    (
        [0] => US
        [1] => "United States"
        [2] => NJ
        [3] => "New Jersey"
        [4] => Belmar
        [5] => 40.1784
        [6] => -74.0218
        [7] => 501
        [8] => 732
        [9] => America/New_York
        [10] => NA
        [11] => 
        [12] => "Verizon FiOS"
        [13] => "Verizon FiOS"
        [14] => verizon.net
        [15] => "AS701 MCI Communications Services
        [16] =>  Inc. d/b/a Verizon Business"
        [17] => Cable/DSL
        [18] => residential
        [19] => 7
        [20] => 99
        [21] => 31
        [22] => 93
        [23] => 
        [24] => 
    )
    */
}
?>