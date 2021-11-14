<?php

$path = ["bd-kit","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","NavSidebarWrapper.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","VSpacer.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","SmallButtonWithIcon.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class NavSidebar extends BDComponent {

    function __construct() {

        $this->children = [
            new NavSidebarWrapper(
                "<div style=\"top:0;position:absolute;\">",
                    new VSpacer("20px"),
                    new SmallButtonWithIcon("Profile", "./profile.php", "fa-user-circle"),
                    new VSpacer("20px"),
                    new SmallButtonWithIcon("Home", "./index.php", "fa-home"),
                    new VSpacer("20px"),
                "</div>",
                "<div style=\"bottom:0;position:absolute;\">",
                    new SmallButtonWithIcon("Settings", "./settings.php", "fa-cog"),
                    new VSpacer("20px"),
                "</div>"
            )
        ];
        return;
    }

}

?>