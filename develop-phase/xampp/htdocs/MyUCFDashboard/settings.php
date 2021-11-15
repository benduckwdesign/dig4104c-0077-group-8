<?php
include_once "backend/queryUserDarkMode.php";
if (queryUserDarkMode("guest") == "on") {
    $css_file = 'dark.css';
} else {
    $css_file = 'base.css';
}
?>
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="./<?=$css_file?>" id="pagestyle"><title>UCF Student Center</title><meta name="og:title" content="UCF Student Center"><meta name="twitter:title" content="UCF Student Center"><meta name="description" content="UCF Student Center prototype for DIG4104."><meta name="og:description" content="UCF Student Center prototype for DIG4104."><meta name="author" content="Benjamin Duckworth"><style>
.b-0a { display:flex;min-height:100vh;flex-direction:column; }
.b-0b { float:left;position:sticky;top:0;width:200px;min-height:100vh;align-items:center;color:#e1e1e1; }
.b-0c { background-color:rgba(0,0,0,0.2); }
.b-0d { top:0; }
.b-0e { position:absolute; }
.b-0f { margin-top:20px; }
.b-0g { display:inline-block; }
.b-0h { text-decoration:none;font-family:'Lato',sans-serif;color:#252525;border:none;font-weight:bold;margin:3px 5px;padding:5px 20px;background-color:#FFF;font-size:18pt;border-radius:999px;} .b-0h:hover { outline:4px solid;animation:outline-color-cycle-l-d 2s infinite; }
.b-0m { bottom:0; }
.b-0u { width:100%;min-height:100vh;align-items:center;color:#252525;margin:0px auto; }
.b-0v { background-color:#e1e1e1; }
.b-0w { display:flex;flex-direction:row;color:#252525; }
.b-0x { flex-wrap:wrap; }
.b-1b { line-height:1; }
.b-1e { display:block;flex-grow:1;width:400px;height:270px;color:#252525; }
.b-1f { background-color:rgba(255,255,255,0.6);border-radius:10px;margin:10px; }
.b-1g { width:auto; }
.b-1h { padding:5px;line-height:1; }
.b-1i { height:200px;width:auto; }
.b-1l { font-weight:500;color:#716439;text-align:right; }
.b-3g { float:left;position:sticky;top:0;width:200px;min-height:100vh;align-items:center;color:#252525; }
.b-3h { background-color:rgba(255,255,255,0.2); }
.b-3m { text-decoration:none;font-family:'Lato',sans-serif;color:#e1e1e1;border:none;font-weight:bold;margin:3px 5px;padding:5px 20px;background-color:#000;font-size:18pt;border-radius:999px;} .b-3m:hover { outline:4px solid;animation:outline-color-cycle-l-d 2s infinite; }
.b-3z { width:100%;min-height:100vh;align-items:center;color:#e1e1e1;margin:0px auto; }
.b-4a { background-color:#3d3d3d; }
.b-4b { display:flex;flex-direction:row;color:#e1e1e1; }
.b-4j { display:block;flex-grow:1;width:400px;height:270px;color:#e1e1e1; }
.b-4k { background-color:rgba(0,0,0,0.4);border-radius:10px;margin:10px; }
.b-4q { font-weight:500;color:#f7cb46;text-align:right; }</style></head>
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