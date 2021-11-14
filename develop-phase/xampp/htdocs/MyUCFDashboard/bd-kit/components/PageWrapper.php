<?php

$path = ["bd-kit","Component.php"];
include_once(join(DIRECTORY_SEPARATOR, $path));

class PageWrapper extends BDComponent {

    function __construct($arg_children) {
        $this->children = ["<div>This is a PageWrapper test.", ...$arg_children, "</div>"];
    }

}

?>