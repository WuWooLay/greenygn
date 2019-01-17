<?php

    session_start();

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "greenygn");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Check connection
    if (mysqli_connect_errno())
    {
        die ( "Failed to connect to MySQL: " . mysqli_connect_error() );
    }

    if( !$conn ) 
    {
        die ( "Failed to connect to MySQL ");
    }


