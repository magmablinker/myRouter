<?php

spl_autoload_register(function($className) {
    switch($className) {
        case file_exists(sprintf("core/%s.php", $className)):
            require_once(sprintf("core/%s.php", $className));
            break;
        case file_exists(sprintf("controller/%s.php", $className)):
            require_once(sprintf("controller/%s.php", $className));
            break;
        case file_exists(sprintf("ressource/%s.php", $className)):
            require_once(sprintf("ressource/%s.php", $className));
            break;
        case file_exists(sprintf("view/%s.php", $className)):
            require_once(sprintf("view/%s.php", $className));
            break;
        case file_exists(sprintf("util/%s.php", $className)):
            require_once(sprintf("util/%s.php", $className));
            break;
        case file_exists(sprintf("handler/%s.php", $className)):
            require_once(sprintf("handler/%s.php", $className));
            break;
        default:
            die("Failed to load class " . $className);
            break;
    }
});

?>