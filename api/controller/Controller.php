<?php

/*
 *
 * @author pmma_
 * @date 04.10.2019
 * 
 */

abstract class Controller {
    
    /*
     * @var $RESPONSE_CODE int the http response code 
     */

    private static $RESPONSE_CODE;

    /*
     * Function to set the http response code
     * 
     * @param $reponseCode int the response code
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

    public static function html() {}

    /*
     *  Function that will return whatever it's supposed
     *  to return if the content-type is json
     */

    public static function json() {}

}

?>