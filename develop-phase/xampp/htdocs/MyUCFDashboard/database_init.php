<?php

echo "Trying to connect to MySQL...\n";

$servername = "localhost";
$username = "root";
$password = "dig4104c";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    echo "Connection failed.\n";
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully.\n";

$sql = "CREATE TABLE `my_ucf_database`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `first_name` VARCHAR(255) NOT NULL , `last_name` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$result = $conn->query($sql);

if ($result == 1) {
    echo("Created users table successfully.\n");
} else {
    echo("Could not create users table, or it already exists.\n");
}

$conn->close();

?> 