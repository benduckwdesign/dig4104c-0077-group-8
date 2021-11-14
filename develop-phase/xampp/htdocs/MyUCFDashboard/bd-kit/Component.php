<?php

class BDComponent {
    
    private $child_html;
    public $children;

    function make_html() {

        $this->child_html = "";

        $i = 0;
        while ($i < count($this->$children)) {
            if (is_string($this->$children[$i]) == TRUE) {
                $this->child_html = $child_html . $this->$children[$i];
            } else {
                if (is_subclass_of($children[$i], 'BDComponent') == TRUE) {
                    $this->child_html = $child_html . $this->$children[$i]->make_html();
                } else {
                    error_log("BDComponent: Child in component children is not of class component or string.", 3, "./errors.log");
                    die();
                }
            }
            $i++;
        }

        return $this->child_html;
    
    }

}

?>