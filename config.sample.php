<?php

if( !$APP ){ die(); }

$config = array(
    'db' => array(
        'host' => '', // Database hostname
        'user' => '', // Database Username
        'pass' => '', // Datebase Password
        'name' => '', // Database Name
    ),
    'files' => '', // The filesystem path to here
    'session_path' => '', // The session path if this is needed
    'http' => '', // The HTTP path to the site
    'debug' => false, // Activate Debug mode
);

$users = array(

    'admin' => '', // The admin password

);

$emailconfig = array(
    'smtp_server' => '', // If an smtp server is needed then set here
    'smtp_port' => '', // If you need to use an alternate smtp port set that here
    'smtp_from' => '', // The email address emails are sent FROM
);
