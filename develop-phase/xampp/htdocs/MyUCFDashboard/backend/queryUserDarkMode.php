<?php

function queryUserDarkMode($USER) {
    include_once "backend/getDatabaseConnection.php";

    $conn = getDatabaseConnection();

    //INSERT INTO `preferences` (`id`, `setting`, `belongs_to`, `value`) VALUES (NULL, 'darkmode', 'guest', 'on');
    // $sql = "INSERT INTO `my_ucf_database.settings`(`setting`,`belongs_to`,`value`) VALUES (`dark_mode`,`guest`,`on`)";
    // $conn->query($sql);

    $sql = "SELECT `id`, `setting`, `belongs_to`, `value` FROM `preferences` WHERE belongs_to='$USER' AND setting='darkmode';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $value = $row["value"];
        }
    } else {
        //no results
    }
    $conn->close();

    // echo $value;
    return $value;
}

?>