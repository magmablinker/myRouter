<?php

class DefaultHandler {

    public static function invalidRequestMethod() {
        Controller::setResponseCode(HttpResponseCodes::HTTP_INVALID_REQUEST_METHOD);
        print(json_encode(array(
            "httpResponseCode" => HttpResponseCodes::HTTP_INVALID_REQUEST_METHOD,
            "message" => "Invalid method for this route"
        )));
    }

}

?>