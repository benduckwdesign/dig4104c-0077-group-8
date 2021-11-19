<?php

$path = [__DIR__,"getDatabaseConnection.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

$conn = getDatabaseConnection();

$sql = "UPDATE `preferences` SET value='off' WHERE setting='darkmode' and belongs_to='guest';";
$result = $conn->query($sql);

$conn->close();

include("config.php");
header("Location: ".$siteroot."home/");
exit();

?>