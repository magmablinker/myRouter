<?php

/*
 * The RouteConstants holds the most important 
 * constants for the Route class
 */

class RouteConstants {

    # Content Types
    const CONTENT_TYPE_JSON = "Content-Type: application/json";
    const CONTENT_TYPE_XML = "Content-Type: application/xml";
    const CONTENT_TYPE_TEXT = "Content-Type: text/html";

    # Acces-Control-Allow-Origin const
    const ACCESS_CONTROL_ORIGIN = "Access-Control-Allow-Origin: " . Config::HOST_NAME;

    # HTTP Methods
    const HTTP_GET = "GET";
    const HTTP_POST = "POST";
    const HTTP_PUT = "PUT";
    const HTTP_DELETE = "DELETE";

}

?>