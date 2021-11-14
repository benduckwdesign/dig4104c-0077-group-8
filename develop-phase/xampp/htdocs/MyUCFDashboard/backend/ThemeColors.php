<?php
include_once "backend/queryUserDarkMode.php";

if (queryUserDarkMode("guest") == "on") {
    GLOBAL $TEXT_COLOR;
    GLOBAL $BACKGROUND_COLOR;
    GLOBAL $TRANSPARENT_BG_COLOR;

    $TEXT_COLOR = "#e1e1e1";
    $BACKGROUND_COLOR = "#3d3d3d";
    $TRANSPARENT_BG_COLOR = "rgba(0,0,0,0.2)";

} else {
    GLOBAL $TEXT_COLOR;
    GLOBAL $BACKGROUND_COLOR;
    GLOBAL $TRANSPARENT_BG_COLOR;

    $TEXT_COLOR = "#252525";
    $BACKGROUND_COLOR = "#e1e1e1";
    $TRANSPARENT_BG_COLOR = "rgba(255,255,255,0.2)";

}
?>