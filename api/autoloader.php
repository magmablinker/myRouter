<?php

spl_autoload_register(function($className) {
    switch($className) {
        case file_exists(sprintf("%s/api/core/%s.php", $_SERVER['DOCUMENT_ROOT'], $className)):
            require_once(sprintf("%s/api/core/%s.php", $_SERVER['DOCUMENT_ROOT'], $className));
            break;
        case file_exists(sprintf("%s/api/controller/%s.php", $_SERVER['DOCUMENT_ROOT'], $className)):
            require_once(sprintf("%s/api/controller/%s.php", $_SERVER['DOCUMENT_ROOT'], $className));
            break;
        case file_exists(sprintf("%s/api/ressource/%s.php", $_SERVER['DOCUMENT_ROOT'], $className)):
            require_once(sprintf("%s/api/ressource/%s.php", $_SERVER['DOCUMENT_ROOT'], $className));
            break;
        case file_exists(sprintf("%s/api/view/%s.php", $_SERVER['DOCUMENT_ROOT'], $className)):
            require_once(sprintf("%s/api/view/%s.php", $_SERVER['DOCUMENT_ROOT'], $className));
            break;
        case file_exists(sprintf("%s/api/util/%s.php", $_SERVER['DOCUMENT_ROOT'], $className)):
            require_once(sprintf("%s/api/util/%s.php", $_SERVER['DOCUMENT_ROOT'], $className));
            break;
        case file_exists(sprintf("%s/api/handler/%s.php", $_SERVER['DOCUMENT_ROOT'], $className)):
            require_once(sprintf("%s/api/handler/%s.php", $_SERVER['DOCUMENT_ROOT'], $className));
            break;
        case file_exists(sprintf("%s/api/middleware/%s.php", $_SERVER['DOCUMENT_ROOT'], $className)):
            require_once(sprintf("%s/api/middleware/%s.php", $_SERVER['DOCUMENT_ROOT'], $className));
            break;
        default:
            die("Failed to load class " . $className);
            break;
    }
});

# We have to do this because we can't assign
# static variables dynamically without helper
Route::build();

header(RouteConstants::ACCESS_CONTROL_ORIGIN);

# This function will be called on the end of the main script
register_shutdown_function("Route::notFound");

?>