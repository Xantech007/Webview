<?php
class Controller {
    protected function view($path, $data = []) {
        extract($data);
        require "../app/views/" . $path . ".php";
    }
}
