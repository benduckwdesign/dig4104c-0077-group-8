<?php

$path = ["bd-kit","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["backend","ThemeColors.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class MainContent extends BDComponent {

    function __construct() {
        GLOBAL $TEXT_COLOR;
        GLOBAL $BACKGROUND_COLOR;
        GLOBAL $TRANSPARENT_BG_COLOR;

        $arg_children = func_get_args();
        $this->children = ["<div style=\"width:100%;min-height:100vh;align-items:center;color:".$TEXT_COLOR.";margin:0px auto;background-color:".$BACKGROUND_COLOR.";\">", "</div>"];
        if (count($arg_children) == 0) {
            return;
        } else {
            $this->children = [$this->children[0], ...$arg_children, $this->children[1]];
            return;
        }
    }

}

?>