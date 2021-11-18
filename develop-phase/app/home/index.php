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

// Send HTML head.
?>
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="<?=$folder_to_root?>/font-awesome-4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="<?=$css_file?>" id="pagestyle"><title>UCF Student Center</title><meta name="og:title" content="UCF Student Center"><meta name="twitter:title" content="UCF Student Center"><meta name="description" content="UCF Student Center prototype for DIG4104."><meta name="og:description" content="UCF Student Center prototype for DIG4104."><meta name="author" content="Benjamin Duckworth"></head>
<?php

$base_path = [__DIR__,$folder_to_root,"bd-kit","components"];

$included_components = ["CardNoLink", "PageWrapper", "MainContent", "NavSidebar", "FlexRow", "ExpandedCard", "VSpacer", "SmallButtonWithIcon"];

$a = 0;
while ($a < count($included_components)) {
    $component_file = $included_components[$a].".php";
    $final_path = $base_path;
    array_push($final_path, $component_file);
    include_once(join(DIRECTORY_SEPARATOR, $final_path));
    $a++;
}

$currentyear = date("Y");
$expectedgraduationdate = "N/A";
// change to registration date later
$beenastudentsince = date("Y");

$page_elements = [
    "<div>",
    new NavSidebar($folder_to_root),
    new MainContent(
        new FlexRow(
            new VSpacer("20px")
        ),
        new FlexRow(
            "<h1 style=\"line-height:1;\">Student Center</h1>"
        ),
        new FlexRow(
            new CardNoLink("Current Year", "<b style=\"padding-left:10px;\">$currentyear</b>"),
            new CardNoLink("Expected Graduation Date", "<b style=\"padding-left:10px;\">$expectedgraduationdate</b>"),
            new CardNoLink("Been a Student Since", "<b style=\"padding-left:10px;\">$beenastudentsince</b>"),
        ),
        new FlexRow(
            new ExpandedCard("Academics", "See More", ""),
            new ExpandedCard("Finances", "Finances", ""),
            new ExpandedCard("Housing", "Housing", ""),
            new ExpandedCard("Calendar", "See Events", ""),
            new ExpandedCard("Knights Email", "See More", ""),
            new ExpandedCard("Quick Links", "See All", "")
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