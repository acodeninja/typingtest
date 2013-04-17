<?php
/**
* The main index file
*/

$APP = true;

if( !file_exists("config.php") ){
	die("No configuration file exists, please see config.sample.php.");
}

include("config.php");

// Set the session save path before starting
if( $config['session_path'] != '' ) {
	session_save_path( $config['session_path'] );
}

session_start();

// Include common libraries
include("includes/functions.php");