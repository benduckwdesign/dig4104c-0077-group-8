<?php

include_once("../Component.php");

class PageWrapper extends Component {

    function __construct($arg_children) {
        parent::__construct();

        $this->children = ["<div>This is a PageWrapper test.", ...$arg_children, "</div>"];

    }

}

?>