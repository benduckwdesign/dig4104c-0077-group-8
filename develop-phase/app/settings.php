<?php
include_once "backend/queryUserDarkMode.php";
if (queryUserDarkMode("guest") == "on") {
    $css_file = 'dark.css';
} else {
    $css_file = 'base.css';
}
?>
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="./<?=$css_file?>" id="pagestyle"><title>UCF Student Center</title><meta name="og:title" content="UCF Student Center"><meta name="twitter:title" content="UCF Student Center"><meta name="description" content="UCF Student Center prototype for DIG4104."><meta name="og:description" content="UCF Student Center prototype for DIG4104."><meta name="author" content="Benjamin Duckworth"></head>
<?php


$path = ["bd-kit","components","PageWrapper.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","MainContent.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","NavSidebar.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","FlexRow.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","ExpandedCard.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","VSpacer.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","SmallButtonWithIcon.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","ProfileImageCircle.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","TextBlock.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
$path = ["bd-kit","components","SettingOption.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

$page_elements = [
    "<div>",
    new NavSidebar(),
    new MainContent(
        new FlexRow(
            new VSpacer("20px")
        ),
        new FlexRow(
            "<h1 style=\"line-height:1;\">Settings</h1>"
        ),
        new FlexRow(
            new SettingOption("Option 1"),
            new SettingOption("Option 2"),
            new SettingOption("Option 3"),
            new SettingOption("Option 4"),
            new SettingOption("Option 5"),
            new SettingOption("Option 6"),
            new SettingOption("Option 7"),
        )
    ),
    "</div>"
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