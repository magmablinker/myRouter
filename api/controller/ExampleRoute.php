<?php

class ExampleRoute extends Controller {
    
    public static function html() {
        require_once($_SERVER['DOCUMENT_ROOT'] .  "/api/views/ExampleRoute.php");
    }

    public static function json() {
        View::json(array(
            "info" => array(
                "route" => Route::$REQUEST_ROUTE->getRoute(),
                "query" => Route::$REQUEST_ROUTE->getQuery(),
                "controller" => get_class() . " Controller"
            ),
            "data" => array(
                "hello" => [ "World", "Other" ],
                "what" => array(
                    "info" => time()
                )
            )
        ));
    }

}

?>