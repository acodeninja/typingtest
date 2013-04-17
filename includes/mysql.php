<?php

/*
 * This is the database interaction
 */

// connect to the database
function db_connect(){
    global $config;
    
    $connection = mysql_connect($config['db']['host'], $config['db']['user'], $config['db']['pass']);
    if(!$connection){
        die("db_connect->mysql_connect". mysql_error());
    }
    
    $database = mysql_select_db($config['db']['name'], $connection);
    if(!$database){
        die("db_connect->mysql_select_db". mysql_error());
    }
    return $connection;
}

// sanitise the input to a field
function db_sanity($text){
    if(get_magic_quotes_gpc()){
        return $text;
    } else {
        if(function_exists('addslashes')){
            return addslashes($text);
        } else {
            return mysql_real_escape_string($text);
        }
    }
}

// unsanitise the output of the database
function db_insanity($text){ 
    $text =  stripcslashes($text);
    return $text;
}

// run a query against the database
function db_query($sql){
    $connection = db_connect();
    $query = mysql_query($sql);
    if(!$query){
        die("db_query->mysql_query". mysql_error().' - '. $sql);
    }else{
        return $query;
    }
}

// count the rows returned by a query
function db_count($sql){
    $query = db_query($sql);
    return mysql_num_rows($query);
}

// abstration of the fetch array function
function db_fetch_array($result){
    return mysql_fetch_array($result);
}

// the current date for insertion into the database
function db_date_current($format=1){
    if($format == 1){
        return date("Y-m-d H:i:s");
    }
    if($format == 2){
        return date("Y-m-d");
    }
}

// mysql readable db_date output
function db_date_mysql($date){
    $date = date('Y-m-d', $date);
    return $date; 
} 

// human readable db_date output
function db_date_readable($date){
    return date("d/m/Y", strtotime($date));
}