<?php

/*
 * The DefaultHandler class stores all handlers
 * for error responses
 */

class DefaultHandler {

    public static function invalidRequestMethod() {
        Controller::setResponseCode(HttpResponseCodes::HTTP_INVALID_REQUEST_METHOD);
        print(json_encode(array(
            "httpResponseCode" => HttpResponseCodes::HTTP_INVALID_REQUEST_METHOD,
            "message" => "Invalid method for this route"
        )));
        die();
    }

    public static function routeNotFound() {
        Controller::setResponseCode(HttpResponseCodes::HTTP_NOT_FOUND);
        print(json_encode(array(
            "httpResponseCode" => HttpResponseCodes::HTTP_NOT_FOUND,
            "message" => "The requested route has not been found."
        )));
        die();
    }

    public static function badRequest($message = null) {
        Controller::setResponseCode(HttpResponseCodes::HTTP_BAD_REQUEST);

        $message = ($message != null) ? $message : "No further information";

        print(json_encode([
            "httpResponse" => "Bad Request",
            "message" => $message
        ]));
        die();
    }

}

?>