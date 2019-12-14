<?php

/*
 * The class HttpResponseCodes has some
 * of the most important response codes as constants
 */

class HttpResponseCodes {

    # OK
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_ACCEPTED = 202;

    # Not OK (user error)
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_INVALID_REQUEST_METHOD = 405;
    const HTTP_RATE_LIMIT = 429;

    # Not OK (server error)
    const HTTP_INTERNAL_SERVER_ERROR = 500;
    const HTTP_NOT_IMPLEMENTED = 501;
    const HTTP_BAD_GATEWAY = 502;
    const HTTP_SERVICE_UNAVAILABLE = 503;
    
}

?>