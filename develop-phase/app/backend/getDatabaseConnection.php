<?php

function getDatabaseConnection() {
    // echo "Trying to connect to MySQL...\n";

    $servername = "localhost";
    $username = "root";
    $password = "dig4104c";
    $database_name = "my_ucf_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        // echo "Connection failed.\n";
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully.\n";
    
    // select correct database
    $sql = "USE ".$database_name.";";
    $conn->query($sql);
    
    return $conn;
}

?>