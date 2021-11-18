<?php

$path = [__DIR__,"..","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = [__DIR__,"..","..","backend","ThemeColors.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class FlexRowNoWrap extends BDComponent {

    function __construct() {
        GLOBAL $TEXT_COLOR;
        GLOBAL $BACKGROUND_COLOR;
        GLOBAL $TRANSPARENT_BG_COLOR;

        $arg_children = func_get_args();
        $this->children = ["<div style=\"display:flex;flex-direction:row;color:".$TEXT_COLOR.";flex-wrap:nowrap;\">", "</div>"];
        if (count($arg_children) == 0) {
            return;
        } else {
            $this->children = [$this->children[0], ...$arg_children, $this->children[1]];
            return;
        }
    }

}

?>