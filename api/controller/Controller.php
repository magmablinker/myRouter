<?php

abstract class Controller {
    
    private static $RESPONSE_CODE;

    /*
     * Function to set the http_response code
     * 
     * @param $reponseCode the response code
     */

    public static function setResponseCode(int $responseCode) : void {
        header(RouteConstants::CONTENT_TYPE_JSON);
        http_response_code($responseCode);
        self::$RESPONSE_CODE = $responseCode;
    }

    /*
     * Function that will return whatever it's supposed
     * to return if the content-type is html
     */

    public static function html() : void {
        header(RouteConstants::CONTENT_TYPE_TEXT);
        $backtrace = debug_backtrace();
        $backtrace = isset($backtrace[1]) ? $backtrace[1]['class'] : $backtrace[0]['class'];

        return View::render("<strong>Error:</strong> please override the html function in the controller " . $backtrace);
    }

    /*
     *  Function that will return whatever it's supposed
     *  to return if the content-type is json
     */

    public static function json() : void {
        header(RouteConstants::CONTENT_TYPE_JSON);
        return array(
            "info" => array(
                "route" => Route::$REQUEST_ROUTE,
                "controller" => "Controller"
            ),
            "data" => array(
                "notice" => "please override this function."
            )
        );
    }

}

?>