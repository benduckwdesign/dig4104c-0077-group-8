<?php

include_once "./components/PageWrapper.php";

$page_elements = [
    PageWrapper("This is additional text.")
];

$this->child_html = "";

$i = 0;
while ($i < count($page_elements)) {
    if (is_string($page_elements[$i]) == TRUE) {
        $this->child_html = $child_html . $page_elements[$i];
    } else {
        if (is_subclass_of($children[$i], 'BDComponent') == TRUE) {
            $this->child_html = $child_html . $page_elements[$i]->make_html();
        } else {
            error_log("TestPage: BDComponent: Child in component children is not of class component or string.", 3, "./errors.log");
            die();
        }
    }
    $i++;
}

echo $this->child_html;

?>