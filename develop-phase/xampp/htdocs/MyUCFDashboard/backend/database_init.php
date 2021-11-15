<?php

include_once "./getDatabaseConnection.php";

$conn = getDatabaseConnection();

$sql = "CREATE TABLE `my_ucf_database`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `first_name` VARCHAR(255) NOT NULL , `last_name` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$result = $conn->query($sql);

if ($result == 1) {
    echo("Created users table successfully.\n");
} else {
    echo("Could not create users table, or it already exists.\n");
}

$sql = "CREATE TABLE `my_ucf_database`.`preferences` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `setting` VARCHAR(255) NOT NULL , `belongs_to` VARCHAR(255) NOT NULL , `value` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$result = $conn->query($sql);

if ($result == 1) {
    echo("Created settings table successfully.\n");
} else {
    echo("Could not create settings table, or it already exists.\n");
}

$conn->close();
?> 