<?php

include("config.php");
include("db_config.php");

$path = [__DIR__,"getDatabaseConnection.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

$conn = getDatabaseConnection();

$sql = "CREATE TABLE `setup` (`id` INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$result = $conn->query($sql);

if ($result == 1) {

    $sql = "CREATE TABLE `users` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `full_name` VARCHAR(255) NOT NULL , `nickname` VARCHAR(255) NOT NULL , `ucfid` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $result = $conn->query($sql);

    $sql = "CREATE TABLE `preferences` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `setting` VARCHAR(255) NOT NULL , `belongs_to` VARCHAR(255) NOT NULL , `value` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $result = $conn->query($sql);

    $sql = "INSERT INTO `preferences` (`id`, `setting`, `belongs_to`, `value`) VALUES (NULL, 'darkmode', 'guest', 'off')";
    $result = $conn->query($sql);

    $sql = "CREATE TABLE `urls` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `url` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $result = $conn->query($sql);

    $urls = [
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Profile', '".$siteroot."account/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Home', '".$siteroot."home/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Settings', '".$siteroot."settings/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Employee Self Service', 'https://my.ucf.edu/psp/IHPROD/EMPLOYEE/EMPL/?cmd=login') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Social Media Directory', '".$siteroot."socialmediadirectory/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Contact Directory', '".$siteroot."contactdirectory/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Donate to UCF', 'https://www.ucf.edu/alumni-giving/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Sign Up', '".$siteroot."register/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Academics', '".$siteroot."academics/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Knights Email', 'https://knightsemail.ucf.edu/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Calendar', 'https://calendar.ucf.edu/2021/fall') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Quick Links', '".$siteroot."quicklinks/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Sign Up', '".$siteroot."register/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Sign In', '".$siteroot."signin/') ",
        "INSERT INTO `urls` (`id`, `name`, `url`) VALUES (NULL, 'Sign Out', '".$siteroot."signout/') ",
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