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
        global $ds;
        global $folder_to_root;
        include(__DIR__.$ds.$folder_to_root.$ds."backend".$ds."config.php");

        $this->children = [
            new NavSidebarWrapper(
                "<div style=\"top:0;position:absolute;\">",
                    "<img style=\"width:100%;height:auto;display:block;\" src=\"".$siteroot."images/tab300.png\">",
                    new VSpacer("5px"),
                    "<p style=\"text-align:center;width:100%;display:inline-block;\"><b>STUDENT CENTER</b></p>",
                    new VSpacer("8px"),
                    new SmallButtonWithIcon("Profile", queryLinkFromName("Profile"), "fa-user-circle"),
                    new VSpacer("20px"),
                    new SmallButtonWithIcon("Home", queryLinkFromName("Home"), "fa-home"),
                    new VSpacer("20px"),
                    new SmallButtonWithIcon("Settings", queryLinkFromName("Settings"), "fa-cog"),
                    new VSpacer("20px"),
                    new SmallButtonWithIcon("Dark Mode", "", "fa-moon-o"),
                    new VSpacer("20px"),
                "</div>",
                "<div style=\"bottom:0;position:absolute;\">",
                    new SmallButtonWithIcon("Employee", queryLinkFromName("Employee Self Service"), "fa-refresh"),
                    new VSpacer("20px"),
                    new SmallButtonWithIcon("Social", queryLinkFromName("Social Media Directory"), "fa-share-square"),
                    new VSpacer("20px"),
                    new SmallButtonWithIcon("Contact", queryLinkFromName("Contact Directory"), "fa-comment"),
                    new VSpacer("20px"),
                    new SmallButtonWithIcon("Donate", queryLinkFromName("Donate to UCF"), "fa-gift"),
                    new VSpacer("20px"),
                "</div>"
            )
        ];
        return;
    }

}

?>