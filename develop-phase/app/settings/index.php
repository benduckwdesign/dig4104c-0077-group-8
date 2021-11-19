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

$included_components = ["SettingOption", "MainContent", "NavSidebar", "FlexRow", "ExpandedCard", "VSpacer", "SmallButtonWithIcon"];

$a = 0;
while ($a < count($included_components)) {
    $component_file = $included_components[$a].".php";
    $final_path = $base_path;
    array_push($final_path, $component_file);
    include_once(join(DIRECTORY_SEPARATOR, $final_path));
    $a++;
}

$settingsform = <<<END
<form style="width:100%;" method="post" enctype="multipart/form-data" action="javascript:void(0);">
<label for="language"><b>Language</b></label>
<select name="language">
<option value="en">English</option>
<option value="es">Spanish</option>
<option value="fr">French</option>
<option value="ru">Russian</option>
<option value="ja">Japanese</option>
<option value="ko">Korean</option>
<option value="ch">Chinese</option>
<option value="ge">German</option>
</select>
<label for="timezone"><b>Time Zone</b></label>
<select name="timezone">
<option value="edt">Eastern Daylight Time</option>
<option value="akdt">Alaska Daylight Time</option>
<option value="cst">Central Daylight Time</option>
<option value="mdt">Mountain Daylight Time</option>
<option value="mst">Mountain Standard Time</option>
<option value="pst">Pacific Standard Time</option>
<option value="hst">Hawaii-Aleutian Standard Time</option>
</select>
<label for="theme"><b>Visual Theme</b></label>
<select name="theme">
<option value="edt">Light Mode</option>
<option value="akdt">Dark Mode</option>
</select>
<label for="password"><b>Change Password</b></label>
<input type="password" placeholder="Enter your current password." name="password"  />
<input type="password" placeholder="Enter a new password." name="newpassword"  />
<button type="submit">Save Changes</button>
</form>
END;

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
            "<h1 style=\"line-height:1;\">Settings</h1>"
        ),
        new FlexRow(
            $settingsform
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