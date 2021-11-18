<?php

// function toggleUserSetting($USER, $SETTING) {

//     $path = [__DIR__,"getDatabaseConnection.php"];
//     include_once(join(DIRECTORY_SEPARATOR, $path));

//     $conn = getDatabaseConnection();

//     $sql = "SELECT `id`, `setting`, `belongs_to`, `value` FROM `preferences` WHERE belongs_to='$USER' AND setting='$SETTING';";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         while($row = $result->fetch_assoc()) {
//           $id = $row["id"];
//           $value = $row["value"];
//           if ($value == "on") {
//               $value = "off";
//           } else {
//               $value = "on";
//           }
//         }
//     } else {
//         $conn->close();
//         return;
//     }

//     $sql = "UPDATE `preferences` SET `value` = '$value' WHERE `preferences`.`id` = $id ";
//     $result = $conn->query($sql);
    
//     $conn->close();
//     return;

// }

?>