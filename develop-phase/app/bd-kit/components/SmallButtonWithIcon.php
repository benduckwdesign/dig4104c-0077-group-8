<?php

$path = ["bd-kit","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class SmallButtonWithIcon extends BDComponent {

    function __construct() {

        $arg_children = func_get_args();
        $title_string = array_shift($arg_children);
        $href_url = array_shift($arg_children);
        $fa_icon = array_shift($arg_children);
        $this->children = ["<div style=\"display:inline-block;\">",
                                "<a href=\"".$href_url."\" class=\"smallbuttonwithicon\">",
                                    "<i class=\"fa ".$fa_icon."\"></i>",
                                    " ",
                                    $title_string,
                                "</a>",
                           "</div>"];
        return;
    }

}

?>