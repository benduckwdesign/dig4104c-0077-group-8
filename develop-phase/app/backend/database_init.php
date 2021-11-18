<?php

include("config.php");
include("db_config.php");

$path = [__DIR__,"getDatabaseConnection.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

$conn = getDatabaseConnection();

$sql = "CREATE TABLE `setup` (`id` INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$result = $conn->query($sql);

if ($result == 1) {

    $sql = "CREATE TABLE `users` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `first_name` VARCHAR(255) NOT NULL , `last_name` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $result = $conn->query($sql);

    $sql = "CREATE TABLE `preferences` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `setting` VARCHAR(255) NOT NULL , `belongs_to` VARCHAR(255) NOT NULL , `value` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $result = $conn->query($sql);

    $sql = "INSERT INTO `preferences`(`setting`,`belongs_to`,`value`) VALUES (`dark_mode`,`guest`,`on`)";
    $result = $conn->query($sql);

    $sql = "CREATE TABLE `urls` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `url` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $result = $conn->query($sql);

    $urls = [
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Profile', '".$siteroot."profile.php') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Home', '".$siteroot."home/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Settings', '".$siteroot."settings.php') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Employee Self Service', 'https://my.ucf.edu/psp/IHPROD/EMPLOYEE/EMPL/?cmd=login') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Social Media Directory', '".$siteroot."socialmediadirectory/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Contact Directory', '".$siteroot."contactdirectory/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Donate to UCF', 'https://www.ucf.edu/alumni-giving/') ",
    ];

    $b = 0;
    while ($b < count($urls)) {
        $sql = $urls[$b];
        $result = $conn->query($sql);
        $b++;
    }

    // Initial setup complete.

} else {
    // Setup was already performed earlier.
}

$conn->close();
?> 