<?php

// Test functions

// Get the test score give the
function test_get_score( $testinput, $testnumber)
{
    global $config;
    
    // Get rid of any slashes
    $testinput = db_insanity($testinput);
    // Grab the test file
    $fh = file( $config['files'] . "tests/test{$testnumber}.txt" );
    
    // Get the test files answer
    $testanswer = $fh[1];
    
    // Score the test
    similar_text($testinput, $testanswer, $percent);
    
    // To 2 decimal places
    $score = round($percent, 2);

    // output the score
    return $score;
}

// Store the test scores
function test_add_answer( $name, $title, $answer, $input, $score )
{
    
    // Sanitise the inputs before we put them in the database
    $name = db_sanity($name );
    $title = db_sanity($title );
    $answer = db_sanity($answer );
    $input = db_sanity($input );
    
    // Construct the sql query
    $sql = "
    INSERT INTO `answers` (
    `name`, 
    `session`, 
    `title`, 
    `answer`, 
    `input`, 
    `score` 
    ) 
    VALUES (
    '{$name}', 
    '{$_SESSION['testersession']}', 
    '{$title}', 
    '{$answer}', 
    '{$input}', 
    '{$score}'
    )
    ";
    
    // Run the query
    db_query( $sql );
}

// Get the results for a given session
function test_get_results( $session )
{
    // run the sanitisation as this comes from the page url
    $session = db_sanity($session );
    
    // construct the sql query
    $sql = "select * from `answers` where `session` = '{$session}'";
    
    // If there are no results then return false, if there are then continue
    if( db_count( $sql ) == 0 )
    {
        return false;
    } else {
        // Run the query
        $results = db_query( $sql );
        
        
        // Construct an array to hold the database output
        $output = array();
        
        // Fill the array
        while( $result = db_fetch_array($results) )
        {
            $result['input'] = db_insanity( $result['input'] );
            $result['answer'] = db_insanity( $result['answer'] ); 
            $output[] = $result;
        }
        
        return $output;
    }
}

// How many tests are there?
function test_count()
{
    global $config;
    
    $i=0;
    foreach( glob( $config['files'] . "tests/*.txt" ) as $file )
    {
        $i++;
    }
    
    return $i;
} 

// Array of test takers names and dates
function test_get_testers()
{
    
    global $config;
    
    // Construct the SQL string
    $sql = "select `session` from answers";
    // Run the query
    $results = db_query( $sql );
    
    $output = array();
    
    while( $result = db_fetch_array($results) )
    {
        $output[] = $result['session'];
    }
    
    $output = array_unique($output);
    
    $return_arr = array();
    foreach( $output as $session )
    {
        $sql = "select `session`, `name`, `timestamp` from answers where `session` = '{$session}' limit 1";
        $return_arr[] = db_fetch_array( db_query( $sql ) );
    }
    
    return $return_arr;
} 

// Delete all test results
function test_deleteall()
{
    // construct sql query
    $sql = "delete from answers";
    
    // run query
    db_query($sql);
}