<?php

/*
 * This includes email sending system.
 */


function email_send($to, $subject, $content){
    global $config;
    global $emailconfig;
    
    $to = db_sanity( $to );
    $subject = db_sanity( $subject );
    $content = db_sanity( $content );
    
    $from = $emailconfig['smtp_from'];
    
    if( $emailconfig['smtp_server'] != '' )
    {
        ini_set( 'smtp', $emailconfig['smtp_server'] );
    }
    if( $emailconfig['smtp_port'] != '' )
    {
        ini_set( 'smtp_port', $emailconfig['smtp_port'] );
    }
    if( $emailconfig['smtp_from'] != '' )
    {
        ini_set( 'sendmail_from', $emailconfig['smtp_from'] );
    }
    
    
    mail($to, $subject, $content, "FROM: {$from}");
}