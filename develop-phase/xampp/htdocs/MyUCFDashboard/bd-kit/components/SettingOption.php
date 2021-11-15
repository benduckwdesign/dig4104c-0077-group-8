<?php

$path = ["bd-kit","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class SettingOption extends BDComponent {

    function __construct() {

        $arg_children = func_get_args();
        $title_string = array_shift($arg_children);
        $this->children = ["<div style=\"margin-left:10px;margin-bottom:10px;width:100%;\">",
                                "<span style=\"margin-right:10px;\">",
                                    $title_string,
                                "</span>",
                                "<label class=\"switch\">",
                                    "<input type=\"checkbox\"></input>",
                                    "<span class=\"slider round\"></span>",
                                "</label>",
                           "</div>"];
        return;
    }

}

?>