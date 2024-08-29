<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "MACVNR_DB";

    // Connection DB
    $conn = new mysqli( $serverName, $userName, $password, $dbName );
    
    if ( $conn -> connect_error ) 
        die( "connection Failed: " . $conn -> connect_error );
?>