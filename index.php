<?php
/**
* The main index file
*/

$APP = true;

if( !file_exists("config.php") ){
	die("No configuration file exists, please see config.sample.php.");
}

include("config.php");
