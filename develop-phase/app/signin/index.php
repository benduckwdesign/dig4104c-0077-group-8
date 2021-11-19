<?php

session_start();

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
include_once(__DIR__.$ds.$folder_to_root.$ds."backend".$ds."queryLinkFromName.php");

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

$msg = "";
$registerform = <<<END
<form style="width:100%;" method="post" enctype="multipart/form-data" action=?#?>
<label><b>UCF Email Address</b></label>
<input type="text" placeholder="Enter your UCF Email Address." name = "email" required />
<label><b>Password</b></label>
<input type="password" placeholder="Enter your password." name = "nn" required />
<input type="button" value="Sign In" />
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

$page_elements = [
    new NavSidebar($folder_to_root),
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
            "<h1 style=\"line-height:1;\">Sign In</h1>"
        ),
        new VSpacer("50px"),
        new FlexRow(
            "<h3 style=\"width:100%;text-align:center;margin:0;\">Welcome back!</h3>",
            "<h4 style=\"width:100%;text-align:center;margin:0;\">Please use the form below to log in.</h4>",
        ),
        new VSpacer("25px"),
        new FlexRow(
            $notice,
        ),
        new VSpacer("25px"),
        new FlexRow(
            "$registerform",
        ),
        new VSpacer("50px"),
        new FlexRow(
            "<p style=\"width:100%;text-align:center;margin:0;\">Don't have an account?</p>",
        ),
        new VSpacer("10px"),
        new FlexRow(
            "<div style=\"margin-left:auto;margin-right:auto;\">",
                new SmallButton("Sign Up",queryLinkFromName("Sign Up")),
            "</div>",
        ),
        new VSpacer("20px"),
        new FlexRow(
            "<p style=\"width:100%;text-align:center;margin:0;\">Forgot your password?</p>",
        ),
        new VSpacer("10px"),
        new FlexRow(
            "<div style=\"margin-left:auto;margin-right:auto;\">",
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