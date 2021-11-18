<?php

$path = [__DIR__,"..","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class SmallButton extends BDComponent {

    function __construct() {

        $arg_children = func_get_args();
        $title_string = array_shift($arg_children);
        $href_url = array_shift($arg_children);
        $this->children = ["<div style=\"display:inline-block;width:auto;\">",
                                "<a href=\"".$href_url."\" style=\"text-align:center;\" class=\"smallbuttonwithicon\">",
                                    $title_string,
                                "</a>",
                           "</div>"];
        return;
    }

}

?>