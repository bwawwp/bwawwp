<?php
$url = $options['host_url'];
$args = array(
 'headers' => array(
  'Authorization' => 'Basic ' . base64_encode( $username . ':' . $password ),
 ),
);
$response = wp_remote_get( $url, $args );