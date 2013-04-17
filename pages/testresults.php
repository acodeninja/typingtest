<?php

// If no results string exists then display an alert saying there is nothing to show
$result = page_current();
if( !isset( $result[1] ) || $result[1] == '' )
{
    $message = "You have not selected a set of results to load, please get the link emailed to you for your results.";
    $page = "blank";
    
// Otherwise load the test results and compare them using jsdiff
} else {
    
    // Get the results from this session
    $testresults = test_get_results( $result[1] );
    
    if( $testresults == false )
    {
        $message = "You have tried to load a set of results that do not exist, please get the link emailed to you for your results.";
        $page = "blank";
    } else {
        // Take some information from them to inject into the template
        $testername = $testresults[0]['name'];
        
    }
    
    
    
}

