<?php

$path = [__DIR__,"..","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = [__DIR__,"..","..","backend","ThemeColors.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class CardNoLink extends BDComponent {

    function __construct() {
        GLOBAL $TEXT_COLOR;
        GLOBAL $BACKGROUND_COLOR;
        GLOBAL $TRANSPARENT_BG_COLOR;
        GLOBAL $CARD_BG_COLOR;
        GLOBAL $LINK_COLOR;

        $arg_children = func_get_args();
        $title_string = array_shift($arg_children);
        if (count($arg_children) == 0) {
            $this->children = ["<div style=\"display:block;flex-grow:1;width:400px;min-height:70px;color:".$TEXT_COLOR.";background-color:".$CARD_BG_COLOR.";border-radius:10px;margin:10px;\">",
                                "<div style=\"width:auto;\">",
                                    "<h6 style=\"padding:5px;line-height:1;\"><b>".$title_string."</b></h6>",
                                "</div>",
                                "<div style=\"min-height:24px;width:auto;background-color:".$TRANSPARENT_BG_COLOR.";\">",
                                "</div>",
                           "</div>"];
            return;
        } else {
            $this->children = ["<div style=\"display:block;flex-grow:1;width:400px;min-height:70px;color:".$TEXT_COLOR.";background-color:".$CARD_BG_COLOR.";border-radius:10px;margin:10px;\">",
                                "<div style=\"width:auto;\">",
                                    "<h6 style=\"padding:5px;line-height:1;\"><b>".$title_string."</b></h6>",
                                "</div>",
                                "<div style=\"min-height:24px;width:auto;background-color:".$TRANSPARENT_BG_COLOR.";\">",
                                    ...$arg_children,
                                "</div>",
                           "</div>"];
            return;
        }
    }

}

?>