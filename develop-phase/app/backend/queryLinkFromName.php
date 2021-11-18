<?php

function queryLinkFromName($NAME) {
    $path = [__DIR__,"getDatabaseConnection.php"];
    include_once(join(DIRECTORY_SEPARATOR, $path));

    $conn = getDatabaseConnection();

    $sql = "SELECT `id`, `name`, `url` FROM `urls` WHERE `name`='$NAME';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $value = $row["url"];
        }
    } else {
        include("config.php");
        $value = $siteroot."404";
    }
    $conn->close();

    // echo $value;
    return $value;
}

?>