<?php

    spl_autoload_register('Autoloader');

    function Autoloader($classname) {
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $path = "src/domain/";
        $extention = ".php";

        if ($classname == "Database") {
            $path = "database/";
        }
        else if ($classname == "Template") {
            $path = "lib/";
        }
        else if ($classname == "Mandje") {
            $path = "src/sessions/";
        }
        else if (strpos($classname, "View")) {
            $path = "src/views/";   
        }
        else if (strpos($classname, "Controller")) {
            $path = "src/controllers/";
        }
        else if (strpos($classname, "Repository")) {
            $path = "src/repositories/";
        }

        if (strpos($url, 'includes')) {
            $path = "../" . $path;
        }
        $fullPath = $path . $classname . $extention;

        if (!file_exists($fullPath)) {
            return false;
        }
        require_once $fullPath;
    }

?>