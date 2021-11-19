<?php

$path = [__DIR__,".","queryUserDarkMode.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

if (queryUserDarkMode("guest") == "on") {
    GLOBAL $TEXT_COLOR;
    GLOBAL $BACKGROUND_COLOR;
    GLOBAL $TRANSPARENT_BG_COLOR;
    GLOBAL $CARD_BG_COLOR;
    GLOBAL $LINK_COLOR;

    $TEXT_COLOR = "#e1e1e1";
    $BACKGROUND_COLOR = "#3d3d3d";
    $TRANSPARENT_BG_COLOR = "rgba(0,0,0,0.2)";
    $CARD_BG_COLOR = "rgba(0,0,0,0.4)";
    $LINK_COLOR = "#f7cb46";

} else {
    GLOBAL $TEXT_COLOR;
    GLOBAL $BACKGROUND_COLOR;
    GLOBAL $TRANSPARENT_BG_COLOR;
    GLOBAL $CARD_BG_COLOR;
    GLOBAL $LINK_COLOR;

    $TEXT_COLOR = "#e1e1e1";
    $BACKGROUND_COLOR = "#e1e1e1";
    $TRANSPARENT_BG_COLOR = "rgba(255,255,255,0.2)";
    $CARD_BG_COLOR = "#c4c4c4";
    $LINK_COLOR = "#716439";
    
}
?>
