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

include_once(__DIR__.$ds.$folder_to_root.$ds."backend".$ds."fonts.php");

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

include_once(__DIR__.$ds."..".$ds."backend".$ds."queryLinkFromName.php");

$currentyear = date("Y");
$expectedgraduationdate = "N/A";
// change to registration date later
$beenastudentsince = date("Y");

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
            "<h1 style=\"line-height:1;\">Student Center</h1>"
        ),
        new FlexRow(
            new CardNoLink("Current Year", "<b style=\"padding-left:10px;\">$currentyear</b>"),
            new CardNoLink("Expected Graduation Date", "<b style=\"padding-left:10px;\">$expectedgraduationdate</b>"),
            new CardNoLink("Been a Student Since", "<b style=\"padding-left:10px;\">$beenastudentsince</b>"),
        ),
        new FlexRow(
			new ExpandedCard("Academics", "Academics", queryLinkFromName("Academics"),
			"<div> 
				<p style=\"color:$TEXT_COLOR; font-size:25px; padding:10px 26px; \">DIG4104 A+</p>
			</div>"),
			new ExpandedCard("Finances", "Finances", queryLinkFromName("Finances"),
			"<div>  
      			<p style=\"color:$TEXT_COLOR; font-size:25px; padding:10px 26px; \">200$</p>
      		</div>"),
			new ExpandedCard("Housing", "Housing", queryLinkFromName("Housing"),
			"<div>
      			<p style=\"color:$TEXT_COLOR; font-size:25px; padding:10px 26px; \">You are currently living in Towers! Your rent is 1200$</p>
			</div>"),
			new ExpandedCard("Calendar", "Calendar", queryLinkFromName("Calendar"),
			"<div>
      			<p style=\"color:$TEXT_COLOR;  font-size:25px; padding:10px 26px; \">11/8/21: DIG4104 Final Exam</p>
				<p style=\"color:$TEXT_COLOR; font-size:25px; padding:10px 26px; \">11/24/21: Thanksgiving!</p>
      		</div>"),
			new ExpandedCard("Knights Email", "Knights Email", queryLinkFromName("Knights Email"),
			"<div>
				<p style=\"color:$TEXT_COLOR; font-size:25px; padding:10px 26px; \">This is for your email! All the important messages that come into your inbox are here!</p>		
      		</div>"),
			new ExpandedCard("Quick Links", "Quick Links", queryLinkFromName("Quick Links"),
			"<div>
      			<p style=\"color:$TEXT_COLOR; font-size:25px; padding:10px 26px; \">Here is some text that I think would be very beneficial to use. I hope it helps out greatly!</p>
      		</div>"),
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
