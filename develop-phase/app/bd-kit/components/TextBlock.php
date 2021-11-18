<?php

$path = [__DIR__,"..","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class TextBlock extends BDComponent {

    function __construct() {

        $arg_children = func_get_args();
        $this->children = ["<p style=\"margin:0px 10px 10px 10px;min-width:200px;\">","</p>"];
        if (count($arg_children) == 0) {
            return;
        } else {
            $this->children = [$this->children[0], ...$arg_children, $this->children[1]];
            return;
        }
    }

}

?>