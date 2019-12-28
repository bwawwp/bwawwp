<?php
// First create a ZipArchive Instance
$zip = new ZipArchive();

// Use the open() method to create a zip file on the server
$zip->open( 'compressed-dir-path/messenlehner-kids.zip', ZipArchive::CREATE );
 
// Set options array to add the directory 'videos' to the zip file
$options = array( 'add_path' => 'videos/', 'remove_all_path' => TRUE );

// Add 'mp4' files from a given directory to the 'videos' directory in the 
zip file
$zip->addGlob( 'some-dir-path/*.mp4', 0, $options );

// Set options array to add the directory 'images' to the zip file
$options = array( 'add_path' => 'images/', 'remove_all_path' => TRUE );

// Add both 'jpg' and 'png' files from a given directory to the 'images'
   directory in the zip file
$zip->addGlob( 'some-other-dir-path/*.{jpg, png}', GLOB_BRACE, $options );

// You can also use regular expressions to get any files from a given directory
$zip->addPattern( '/\.(?:jpg|png)$/', 'another-dir-path', $options );

// Call the close() method to finish and save your new zip 
$zip->close();