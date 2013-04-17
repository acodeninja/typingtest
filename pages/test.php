<?php

// If the test var is not set then go to the first test
$test = page_current();
if( $test[1] == '' )
{
    header( "Location: test/1" );
}

// If the testers name has been submitted then save it to the session
if( isset( $_POST['testername'] ) && $_POST['testername'] != '' )
{
    $_SESSION['testername'] = db_sanity( $_POST['testername'] );
    $_SESSION['testersession'] = md5( db_sanity( $_POST['testername'] ) . date("U") );
}

// If the testers name is set then display the test and follow any testing functions, if not then send to the home page.
if( isset( $_SESSION['testername'] ) && $_SESSION['testername'] != '' )
{
    // Set the current test number
    $test = $test[1];
    
    // If the test has been submitted 
    if( isset( $_POST['testsubmit'] ) )
    {
        $lasttest = db_sanity( $_POST['test'] );
        $lasttestinput = db_sanity( $_POST['testinput'] );
        $name = db_sanity( $_SESSION['testername'] );
        
        
        $fh = file( $config['files'] . "tests/test{$lasttest}.txt" );
        $lasttesttitle = $fh[0];
        $lasttestanswer = $fh[1];
        
        test_add_answer( $_SESSION['testername'], $lasttesttitle, $lasttestanswer, $lasttestinput, test_get_score($lasttestinput, $lasttest) );
        
    }
    
    // If the test file does not exist then hit it and quit
    if( !file_exists( "tests/test{$test}.txt" ) )
    {
        $page = "testfinish";
        
    } else {
        
        $fh = file( $config['files'] . "tests/test{$test}.txt" );
        $thistesttitle = $fh[0];
        $thistestanswer = $fh[1];
        
    }
    
    // Calculate how far through the tests you are
    $test_completion = $test / test_count() * 100;
    
    
} else {
    $message = "You need to enter your name before you can start the test.";
    $page = "home";
}