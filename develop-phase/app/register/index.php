<?php

session_start();

$ds = DIRECTORY_SEPARATOR;

// Set path to site root relative to current file for serving CSS.

$folder_to_root = "..";

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

$included_components = ["SmallButton", "CardNoLink", "PageWrapper", "MainContent", "NavSidebar", "FlexRow", "ExpandedCard", "VSpacer", "SmallButtonWithIcon"];

$a = 0;
while ($a < count($included_components)) {
    $component_file = $included_components[$a].".php";
    $final_path = $base_path;
    array_push($final_path, $component_file);
    include_once(join(DIRECTORY_SEPARATOR, $final_path));
    $a++;
}

$ds = DIRECTORY_SEPARATOR;
include(__DIR__.$ds."..".$ds."backend".$ds."config.php");

$process_registration = $siteroot."backend/process_registration.php";

$registerform = <<<END
<form style="width:100%;" method="post" enctype="multipart/form-data" action="$process_registration">
<label for="fullname"><b>Full Name</b></label>
<input type="text" placeholder="Enter your full name." name="fullname" required />
<label for="nickname"><b>Nickname</b></label>
<input type="text" placeholder="What should we call you?" name="nickname" required />
<label for="password"><b>Password</b></label>
<input type="password" placeholder="Enter a password." name="password" required />
<label for="email"><b>UCF Email Address</b></label>
<input type="text" placeholder="Enter your UCF email address." name="email" />
<label for="ucfid"><b>UCF ID Number</b></label>
<input type="text" placeholder="Enter your UCF ID number." name="ucfid" />
<button type="submit">Sign Up</button>
</form>
END;

$notice = "";
if (!empty($_SESSION['process_notice_unseen'])) {
    if ($_SESSION['process_notice_unseen'] == True) {
        $title = $_SESSION['process_notice_msg_title'];
        $msg = $_SESSION['process_notice_msg'];
        $notice = "<p style=\"width:100%;text-align:center;margin:0;\">$title</p><p style=\"width:100%;text-align:center;margin:0;\">$msg</p>";
        $_SESSION['process_notice_unseen'] = False;
    } else {
        // ignore
    }
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
            "<h1 style=\"line-height:1;\">Sign Up</h1>"
        ),
        new VSpacer("25px"),
        new FlexRow(
          "<h3 style=\"width:100%;text-align:center;margin:0;\">Welcome to UCF!</h3>",
          "<h4 style=\"width:100%;text-align:center;margin:0;\">Please use the form below to register.</h4>",
        ),
        new VSpacer("25px"),
        new FlexRow(
            $notice,
        ),
        new VSpacer("25px"),
        new FlexRow(
            "$registerform",
        ),
        new VSpacer("25px"),
        new FlexRow(
            "<p style=\"width:100%;text-align:center;margin:0;\">Already have an account?</p>",
            "<div style=\"margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:10px;\">",
                new SmallButton("Sign In",queryLinkFromName("Sign In")),
            "</div>",
        ),
        new VSpacer("10px"),
        new FlexRow(
            "<p style=\"width:100%;text-align:center;margin:0;\">Forgot your password?</p>",
            "<div style=\"margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:10px;\">",
                new SmallButton("Reset Password",queryLinkFromName("Reset Password")),
            "</div>",
        ),
        new VSpacer("50px"),
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