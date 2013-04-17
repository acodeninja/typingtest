<?php

// find out if any sub page has been set
$temp = page_current();
if( isset($temp[1]) ) { $subpage = $temp[1]; } else { $subpage = ''; }

// If the login form has been submitted then do that shit
if( isset( $_POST['submitted'] ) )
{
    if( $_POST['password'] == $users['admin'] )
    {
        $_SESSION['adm_token'] = md5( $users['admin'] );
    }
}

// If the admin session token is not there then hit it and quit
if( !isset( $_SESSION['adm_token'] ) || $_SESSION['adm_token'] == '')
{
    $adm_loggedin = false;
} else {
    $adm_loggedin = true;
    
    // Things that will only run if the admin is logged in
    
    // If the delete page has been selected
    if( $subpage == 'delete' )
    {
        
        if( !isset( $_GET['confirm'] ) )
        {
            $message = "Are you sure you would like to delete the test results? <span class='pull-right'><a href='{$config['http']}index.php/admin/delete?confirm=true' class='btn btn-small btn-danger'>Yes</a> <a href='{$config['http']}index.php/admin' class='btn btn-small btn-success'>No</a></span>";
            $page = "admin";
        } else {
            test_deleteall();
            $message = "All test results have been deleted.";
            $page = "admin";
        }
        
    }

    // If the email form has been submitted then send all the test results
    if( $subpage == 'email' )
    {
        if( $_POST['email'] == '' )
        {
            $message = "You need to enter an email address to send the results.";
            $page = "admin";
        } else {
            $to = db_sanity($_POST['email'] );
            
            $content_arr = array();
            
            $testers = test_get_testers();
            foreach( $testers as $tester )
            {
                $results = test_get_results( $tester['session'] );
                $tester['results'] = $results;
                $content_arr[] = $tester;
            }
            
            foreach( $content_arr as $content )
            {
                $email_subject = "Typing Test Results for " . $content['name'] . " taken " . db_date_readable($content['timestamp']);
                
                $email_content = "
Typing Test Results for " . $content['name'] . " taken " . db_date_readable($content['timestamp']) . "
The results of the tests are listed below.
                ";
                
                foreach( $content['results'] as $result )
                {
                    $email_content .= "
Test name: " . $result['title'] . "
Correct Answer: " . $result['answer'] . "
Given Answer: " . $result['input'] . "
Score: " . $result['score'] . "

                    ";
                }

                email_send($to, $email_subject, $email_content);
                
                $message = "The results have been sent to {$to}.";
                $page = "admin";
                
            }
            
        }
    }
    
}
