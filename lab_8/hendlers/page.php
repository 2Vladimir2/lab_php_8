<?php
// page.php
class Page {
    public static function part($title) {
        include "./handlers/$title-handler.php";
        include "./views/components/$title.php";
    }
}