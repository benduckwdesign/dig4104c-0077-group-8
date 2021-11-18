<?php
$path = [__DIR__,"backend","queryUserDarkMode.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));
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

$page_elements = [
    "<div>",
    new NavSidebar(),
    new MainContent(
        new FlexRow(
            new VSpacer("20px")
        ),
        new FlexRow(
            "<h1 style=\"line-height:1;\">Profile</h1>"
        ),
        new FlexRow(
            new ProfileImageCircle(),
            new TextBlock("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate egestas dui vitae hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Quisque ut rhoncus orci. Fusce in pharetra nisl. Cras tristique odio tortor, vel facilisis libero elementum at. Maecenas pretium feugiat nibh, sit amet venenatis tortor blandit vel. Quisque iaculis eros ut eleifend venenatis. Maecenas finibus tellus vestibulum arcu semper pellentesque nec vel risus. Phasellus dignissim dolor ipsum, ut fermentum dui facilisis id."),
            new TextBlock("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate egestas dui vitae hendrerit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Quisque ut rhoncus orci. Fusce in pharetra nisl. Cras tristique odio tortor, vel facilisis libero elementum at. Maecenas pretium feugiat nibh, sit amet venenatis tortor blandit vel. Quisque iaculis eros ut eleifend venenatis. Maecenas finibus tellus vestibulum arcu semper pellentesque nec vel risus. Phasellus dignissim dolor ipsum, ut fermentum dui facilisis id."),
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