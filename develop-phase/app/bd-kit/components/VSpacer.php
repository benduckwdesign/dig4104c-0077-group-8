<?php

$path = [__DIR__,"..","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class VSpacer extends BDComponent {

    function __construct() {

        $arg_children = func_get_args();
        $margin_top = array_shift($arg_children);
        $this->children = ["<div style=\"margin-top:".$margin_top.";\">", "</div>"];
        if (count($arg_children) == 0) {
            return;
        } else {
            $this->children = [$this->children[0], ...$arg_children, $this->children[1]];
            return;
        }
    }

}

?>