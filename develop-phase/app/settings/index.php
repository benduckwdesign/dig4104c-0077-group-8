<?php
$ds = DIRECTORY_SEPARATOR;

// Set path to site root relative to current file for serving CSS.

$folder_to_root = [".."];
$folder_to_root = join($ds, $folder_to_root);

// Check and set CSS according to whether dark mode is enabled.

include_once(__DIR__.$ds.$folder_to_root.$ds."backend".$ds."queryUserDarkMode.php");

if (queryUserDarkMode("guest") == "on") {
    $css_file = $folder_to_root.'/dark.css';
} else {
    $css_file = $folder_to_root.'/base.css';
}

?>
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="<?=$folder_to_root?>/font-awesome-4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="./<?=$css_file?>" id="pagestyle"><title>UCF Student Center</title><meta name="og:title" content="UCF Student Center"><meta name="twitter:title" content="UCF Student Center"><meta name="description" content="UCF Student Center prototype for DIG4104."><meta name="og:description" content="UCF Student Center prototype for DIG4104."><meta name="author" content="Benjamin Duckworth"></head>
<?php

$base_path = [__DIR__,$folder_to_root,"bd-kit","components"];

$included_components = ["SettingOption", "MainContent", "NavSidebar", "FlexRow", "ExpandedCard", "VSpacer", "SmallButtonWithIcon"];

$a = 0;
while ($a < count($included_components)) {
    $component_file = $included_components[$a].".php";
    $final_path = $base_path;
    array_push($final_path, $component_file);
    include_once(join(DIRECTORY_SEPARATOR, $final_path));
    $a++;
}

$page_elements = [
    new NavSidebar(),
    new MainContent(
        new FlexRow(
            "<div style=\"max-height:160px;overflow:hidden;\"><picture id=\"header-picture\" style=\"header-picture\">
                <source srcset=\"https://www.ucf.edu/files/2021/03/myucf-login-bg-millicanhall-1600x550-opt.jpeg\" media=\"(min-width: 992px)\" id=\"header-picture-source-lg\">
                <source srcset=\"https://www.ucf.edu/files/2021/03/myucf-login-bg-MillicanHall-medium-991x270-opt.jpg\" media=\"(min-width: 768px)\" id=\"header-picture-source-md\">
                <source srcset=\"https://www.ucf.edu/files/2021/03/myucf-login-bg-MillicanHall-small-767x270-opt.jpg\" media=\"(min-width: 576px)\" id=\"header-picture-source-sm\">
                <source srcset=\"https://www.ucf.edu/files/2021/03/myucf-login-bg-MillicanHall-575x270-opt.jpg\" media=\"(max-width: 575px)\" id=\"header-picture-source-xs\">
                <img class=\"header-picture-img object-fit-cover\" id=\"header-picture-source-fallback\" src=\"https://www.ucf.edu/files/2021/03/myucf-login-bg-millicanhall-1600x550-opt.jpeg\" alt=\"\" data-object-fit=\"cover\">
            </picture></div>"
            ),
        new FlexRow(
            new VSpacer("20px")
        ),
        new FlexRow(
            "<h1 style=\"line-height:1;\">Settings</h1>"
        ),
        new FlexRow(
            new SettingOption("Language"),
            new SettingOption("Dark Mode"),
            new SettingOption("Password Reset"),
            new SettingOption("Time Zone"),
        )
    ),
];


$child_html = "";

$i = 0;
while ($i < count($page_elements)) {
    if (is_string($page_elements[$i]) == TRUE) {
        $child_html = $child_html . $page_elements[$i];
    } else {
        if (is_subclass_of($page_elements[$i], 'BDComponent') == TRUE) {
            $child_html = $child_html . $page_elements[$i]->make_html();
        } else {
            error_log("TestPage: BDComponent: Child in component children is not of class component or string.", 3, "./errors.log");
            die();
        }
    }
    $i++;
}

echo $child_html;

?>