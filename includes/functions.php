<?php
/**
* Common functions
*/

// Get the current page
function page_current()
{
    $page = $_SERVER['REQUEST_URI'];
    $page = explode( "?", $page );
    $page = explode( "/", $page[0] );
        
    array_shift( $page );
    array_shift( $page );
    array_shift( $page );
        
    return $page;
}