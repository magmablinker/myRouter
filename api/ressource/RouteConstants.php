<?php

/*
 * The RouteConstants holds the most important 
 * constants for the Route class
 */

class RouteConstants {

    # Content Types
    const CONTENT_TYPE = "Content-Type: ";
    const CONTENT_TYPE_JSON = self::CONTENT_TYPE . "application/json";
    const CONTENT_TYPE_XML = self::CONTENT_TYPE . "application/xml";
    const CONTENT_TYPE_TEXT = self::CONTENT_TYPE . "text/html";

    # HTTP Methods
    const HTTP_GET = "GET";
    const HTTP_POST = "POST";
    const HTTP_PUT = "PUT";
    const HTTP_DELETE = "DELETE";

}

?>