<?php

$path = [__DIR__,"..","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class PageWrapper extends BDComponent {

    function __construct() {
        $arg_children = func_get_args();
        $this->children = ["<div>This is a PageWrapper test.", "</div>"];
        if (count($arg_children) == 0) {
            return;
        } else {
            $this->children = [$this->children[0], ...$arg_children, $this->children[1]];
            return;
        }
    }

}

?>