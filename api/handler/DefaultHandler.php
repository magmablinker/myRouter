<?php

/*
 * The DefaultHandler class stores all handlers
 * for error responses
 */

class DefaultHandler {

    public static function invalidRequestMethod() {
        Controller::setResponseCode(HttpResponseCodes::HTTP_INVALID_REQUEST_METHOD);
        return [
            "message" => "Invalid method for this route"
        ];
    }

    public static function routeNotFound() {
        Controller::setResponseCode(HttpResponseCodes::HTTP_NOT_FOUND);
        return [
            "message" => "The requested route has not been found."
        ];
    }

    public static function badRequest($message = null) {
        Controller::setResponseCode(HttpResponseCodes::HTTP_BAD_REQUEST);

        $message = ($message != null) ? $message : "No further information";

        return [
            "httpResponse" => "Bad Request",
            "message" => $message
        ];
    }

    public static function unableToProccessRequest() {
        Controller::setResponseCode(HttpResponseCodes::HTTP_INTERNAL_SERVER_ERROR);
        return [
            "message" => "Unable to proccess the request. Try again later"
        ];
    }

    public static function unauthorizedAccess() {
        Controller::setResponseCode(HttpResponseCodes::HTTP_UNAUTHORIZED);
        return [
            "message" => "Unauthorized access."
        ];
    }

    public static function rateLimit() {
        Controller::setResponseCode(HttpResponseCodes::HTTP_RATE_LIMIT);
        return [
            "message" => sprintf("Too many requests, the max. is one request per %d seconds", Config::MAX_REQUESTS_SECOND)
        ];
    }

    public static function databaseMissingCredentials() {
        Controller::setResponseCode(HttpResponseCodes::HTTP_INTERNAL_SERVER_ERROR);
        return [
            "message" => "Please adjust the database constants in the config file to use this functionality."
        ];
    }

    public static function loginMissingConfiguration() {
        Controller::setResponseCode(HttpResponseCodes::HTTP_INTERNAL_SERVER_ERROR);
        return [
            "message" => "Please adjust the login related constants in the config file to use this functionality"
        ];
    }

    public static function responseOk($message, $data = null) {
        Controller::setResponseCode(HttpResponseCodes::HTTP_OK);
        $response = [
            "message" => $message
        ];

        if($data != null) {
            $response['data'] = $data;
        }

        return $response;
    }
 
}

?>