<?php

$path = [__DIR__,"..","..","backend","ThemeColors.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = [__DIR__,"..","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class ProfileImageCircle extends BDComponent {

function __construct() {

    GLOBAL $TRANSPARENT_BG_COLOR;

    $arg_children = func_get_args();
    $this->children = ["<div style=\"display:inline-block;min-width:200px;min-height:200px;max-width:200px;max-height:200px;background-color:".$TRANSPARENT_BG_COLOR.";border-radius:999px;margin-left:10px;margin-bottom:10px;;\">", "</div>"];
    if (count($arg_children) == 0) {
        return;
    } else {
        $this->children = [$this->children[0], ...$arg_children, $this->children[1]];
        return;
    }
}

}