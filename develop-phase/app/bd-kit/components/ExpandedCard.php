<?php

$path = [__DIR__,"..","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = [__DIR__,"..","..","backend","ThemeColors.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class ExpandedCard extends BDComponent {

    function __construct() {
        GLOBAL $TEXT_COLOR;
        GLOBAL $BACKGROUND_COLOR;
        GLOBAL $TRANSPARENT_BG_COLOR;
        GLOBAL $CARD_BG_COLOR;
        GLOBAL $LINK_COLOR;

        $arg_children = func_get_args();
        $title_string = array_shift($arg_children);
        $url_string = array_shift($arg_children);
        $url_href = array_shift($arg_children);
        if (count($arg_children) == 0) {
            $this->children = ["<div style=\"display:block;flex-grow:1;width:400px;height:270px;color:".$TEXT_COLOR.";background-color:".$CARD_BG_COLOR.";border-radius:10px;margin:10px;\">",
                                "<div style=\"width:auto;\">",
                                    "<h6 style=\"padding:5px;line-height:1;\"><b>".$title_string."</b></h6>",
                                "</div>",
                                "<div style=\"height:200px;width:auto;background-color:".$TRANSPARENT_BG_COLOR.";\">",
                                "</div>",
                                "<div style=\"width:auto;\">",
                                    "<a href=\"".$url_href."\" style=\"font-weight:500;color:".$LINK_COLOR.";text-align:right;\">",
                                        "<h6>",
                                            $url_string, " ", "<i class=\"fa fa-chevron-right\" style=\"padding:5px;line-height:1;\"></i>",
                                        "</h6>",
                                    "</a>",
                                "</div>",
                           "</div>"];
            return;
        } else {
            $this->children = ["<div style=\"display:block;flex-grow:1;width:400px;height:270px;color:".$TEXT_COLOR.";background-color:".$CARD_BG_COLOR.";border-radius:10px;margin:10px;\">",
                                "<div style=\"width:auto;\">",
                                    "<h6 style=\"padding:5px;line-height:1;\"><b>".$title_string."</b></h6>",
                                "</div>",
                                "<div style=\"height:200px;width:auto;background-color:".$TRANSPARENT_BG_COLOR.";\">",
                                    ...$arg_children,
                                "</div>",
                                "<div style=\"width:auto;\">",
                                    "<a href=\"".$url_href."\" style=\"font-weight:500;color:".$LINK_COLOR.";text-align:right;\">",
                                        "<h6>",
                                            $url_string, " ", "<i class=\"fa fa-chevron-right\" style=\"padding:5px;line-height:1;\"></i>",
                                        "</h6>",
                                    "</a>",
                                "</div>",
                           "</div>"];
            return;
        }
    }

}

?>