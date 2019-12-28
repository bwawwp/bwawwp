<?php
// How to extract files from a zip file on your server
$zip = new ZipArchive();
$zip->open( 'compressed-dir-path/messenlehner-kids.zip', 
     ZipArchive::CREATE );

// Use the extractTo() method to extract files in a zip on the server
// Extracts one file
$zip->extractTo( 'uncompressed-dir-path/', 'images/aksel.png' ); 

// Extracts files in an array
$zip->extractTo( 'uncompressed-dir-path/', 
     array( 'images/cam.png', 'images/nina.png' ) ); 

// Extracts all files in the zip 
$zip->extractTo( 'uncompressed-dir-path/' ); 

$zip->close();