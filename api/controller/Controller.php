<?php

abstract class Controller {
    private static $RESPONSE_CODE;

    public static function setResponseCode($responseCode) {
        header(RouteConstants::CONTENT_TYPE_JSON);
        http_response_code($responseCode);
        self::$RESPONSE_CODE = $responseCode;
    }

    public static function html() {
        $backtrace = debug_backtrace();
        $backtrace = isset($backtrace[1]) ? $backtrace[1]['class'] : $backtrace[0]['class'];

        return View::render("<strong>Error:</strong> please override the html function in the controller " . $backtrace);
    }

    public static function json() {
        return array(
            "info" => array(
                "route" => Route::$REQUEST_ROUTE->getRoute(),
                "query" => Route::$REQUEST_ROUTE->getQuery(),
                "controller" => "Controller"
            ),
            "data" => array(
                "notice" => "please override this function."
            )
        );
    }

}

?>