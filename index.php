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
include("includes/mysql.php");
include("includes/test.php");
include("includes/email.php");

// Find out what page we are on
$page = page_current();
$page = $page[0];

if( $page == '' || $page == 'index.php' ) // For the moment we might need to add other conditionals here
{

	header( "Location: index.php/home");
	echo '<meta http-equiv="refresh" content="0, ' . $config['http'] . 'index.php/home">';

} else {

}