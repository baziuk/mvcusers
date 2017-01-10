<?php

class view {
    public $data;
    public function render($name, $data = false){
        $this->data = $data;
        require_once 'views/begin_view.php';
        require 'views/'.$name.".php";
        require_once 'views/end_view.php';
    }
}
?>