<?php
// First create a ZipArchive Instance
$zip = new ZipArchive();

// Use the open() method to create a zip file on the server
$zip->open( 'compressed-dir-path/messenlehner-kids.zip', ZipArchive::CREATE );

// Use the addFile() method to add a file to your zip 
$zip->addFile( 'some-dir-path/index.html', 'index.html' );

// You can also add files to subdirectories within the zip
$zip->addFile( 'some-dir-path/dalya.png', 'images/dalya.png' );
$zip->addFile( 'some-dir-path/brian.png', 'images/brian.png' );
$zip->addFile( 'some-dir-path/nina.mp4', 'videos/nina.png' );

// You can also change a file name while you are adding it to the zip
$zip->addFile( 'some-dir-path/CWM.png', 'images/cam.png' );
$zip->addFile( 'some-dir-path/babyA.png', 'images/aksel.png' );

// Call the close() method to finish and save your new zip 
$zip->close();