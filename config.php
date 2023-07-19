<?php
    // Start the session
    session_start();    

    $dbhost = "148.66.138.145";
    $dbuser = "dbusrShnkr23";
    $dbpass = "studDBpwWeb2!";
    $dbname = "dbShnkr23stud2";

    // Create connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Report all errors
    error_reporting(E_ALL);

    // Display errors
    ini_set('display_errors', 1);
?>