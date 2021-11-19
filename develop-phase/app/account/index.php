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

include_once(__DIR__.$ds.$folder_to_root.$ds."backend".$ds."fonts.php");

$base_path = [__DIR__,$folder_to_root,"bd-kit","components"];

$included_components = ["CardNoLink", "ProfileImageCircle", "MainContent", "NavSidebar", "FlexRow", "ExpandedCard", "VSpacer", "SmallButtonWithIcon", "TextBlock"];

$a = 0;
while ($a < count($included_components)) {
    $component_file = $included_components[$a].".php";
    $final_path = $base_path;
    array_push($final_path, $component_file);
    include_once(join(DIRECTORY_SEPARATOR, $final_path));
    $a++;
}

$header_img_url = "https://www.ucf.edu/files/2021/03/myucf-login-bg-millicanhall-1600x550-opt.jpeg";
$header_element = "<div style=\"height:160px;width:100%;overflow:hidden;background-size:cover;background-color:transparent;background-image:url('$header_img_url');\"></div>";

$page_elements = [
    new NavSidebar(),
    new MainContent(
        new FlexRow(
            $header_element
            ),
        new FlexRow(
            new VSpacer("20px")
        ),
        new FlexRow(
            "<h1 style=\"line-height:1;\">Personal Information</h1>"
        ),
        new FlexRow(
            new ProfileImageCircle(),
            "<h2>Guest User</h2>"
        ),
        new FlexRow(
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\"><b>Profile Photo</b></p>"
        ),
        new FlexRow(
            new CardNoLink("User Info",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\"><b>Full Name</b></p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\">Guest User</p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\"><b>Pronouns</b></p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\">Other</p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\"><b>Address</b></p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\">Not Available</p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\"><b>Phone Number</b></p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\">(123) 555-5555</p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\"><b>Recovery Email Address</b></p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\">example@example.example</p>",),
            new CardNoLink("UCF Info",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\"><b>UCF Email Address</b></p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\">example@knights.ucf.edu</p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\"><b>UCF ID</b></p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\">ab1234546</p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\"><b>Emergency Contact</b></p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\">Mom (Legal Guardian)</p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\"><em>Home</em> (123) 555-5555</p>",
            "<p style=\"width:100%;padding-left:10px;padding-bottom:10px;\"><em>Cell</em> (123) 555-5555</p>",)
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