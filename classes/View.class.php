<?php
class View {
    public static function createView($view, $data) {
        extract($data);
        ob_start();
        require($view);
        $content = ob_get_clean();
        require_once "./views/template.php";
    }
}