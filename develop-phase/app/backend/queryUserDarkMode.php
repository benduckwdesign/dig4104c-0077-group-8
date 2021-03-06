<?php

function queryUserDarkMode($USER) {
    $path = [__DIR__,"getDatabaseConnection.php"];
    include_once(join(DIRECTORY_SEPARATOR, $path));

    $conn = getDatabaseConnection();

    $sql = "SELECT `id`, `setting`, `belongs_to`, `value` FROM `preferences` WHERE belongs_to='$USER' AND setting='darkmode';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $value = $row["value"];
        }
    } else {
        $value = "off";
    }
    $conn->close();

    // echo $value;
    return $value;
}

?>