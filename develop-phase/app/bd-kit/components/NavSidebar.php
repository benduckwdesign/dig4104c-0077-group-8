<?php

$path = [__DIR__,"..","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = [__DIR__,"NavSidebarWrapper.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = [__DIR__,"VSpacer.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = [__DIR__,"SmallButtonWithIcon.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

$ds = DIRECTORY_SEPARATOR;
$folder_to_root = "..".$ds."..";
include_once(__DIR__.$ds.$folder_to_root.$ds."backend".$ds."queryLinkFromName.php");

class NavSidebar extends BDComponent {

    function __construct() {

        $arg_children = func_get_args();
        $path_to_root = array_shift($arg_children);

        $this->children = [
            new NavSidebarWrapper(
                "<div style=\"top:0;position:absolute;\">",
                    new VSpacer("20px"),
                    new SmallButtonWithIcon("Profile", queryLinkFromName("Profile"), "fa-user-circle"),
                    new VSpacer("20px"),
                    new SmallButtonWithIcon("Home", queryLinkFromName("Home"), "fa-home"),
                    new VSpacer("20px"),
                "</div>",
                "<div style=\"bottom:0;position:absolute;\">",
                    new SmallButtonWithIcon("Settings", queryLinkFromName("Settings"), "fa-cog"),
                    new VSpacer("20px"),
                "</div>"
            )
        ];
        return;
    }

}

?>