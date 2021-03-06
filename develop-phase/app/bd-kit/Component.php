<?php

class BDComponent {
    
    private $child_html;
    public $children;

    function make_html() {

        $this->child_html = "";

        $i = 0;
        while ($i < count($this->children)) {
            if (is_string($this->children[$i]) == TRUE) {
                $this->child_html = $this->child_html . $this->children[$i];
            } else {
                if (is_subclass_of($this->children[$i], 'BDComponent') == TRUE) {
                    $this->child_html = $this->child_html . $this->children[$i]->make_html();
                } else {
                    echo print_r($this->children[$i]);
                    error_log("BDComponent: Child of type " . get_class($this->children[$i]) . " in component children is not of class component or string.\n", 3, "./errors.log");
                    die();
                }
            }
            $i++;
        }

        return $this->child_html;
    
    }

}

?>