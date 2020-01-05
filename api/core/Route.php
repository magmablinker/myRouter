<?php

/**
 * This is the central class in this project
 * which manages the routes supplied by the api
 * 
 * @author pmma_
 * @since 04.10.2019
 * 
 */

class Route {

    /**
     * 
     * @var string the request route ($_SERVER['REQUEST_URI'])
     */
    
    private static $REQUEST_ROUTE = null;

    /**
     * @var bool is to check at script termination if the route has been found
     */

    private static $NOT_FOUND = true;
    
    /* 
     * We need this helper function since we can't
     * assign static variables dynamically in php
     */

    public static function build() : void {
        if(self::$REQUEST_ROUTE === null) {
            self::$REQUEST_ROUTE = $_SERVER['REQUEST_URI'];
        }
    }

    /**
     * Default handler for get routes
     * 
     * @param string $uri The requested route
     * @param function $callback The function that will be called
     * 
     */

    public static function get(string $uri, $callback) : void {
        if(self::$REQUEST_ROUTE != null && preg_match("@^" . $uri . "?$@", self::$REQUEST_ROUTE)) {
            self::$NOT_FOUND = false;
            if($_SERVER['REQUEST_METHOD'] === RouteConstants::HTTP_GET) {
                $callback();
            } else {
                DefaultHandler::invalidRequestMethod();
            }
        }
    }

    /**
     * Default handler for post routes
     * 
     * @param string $uri The requested route
     * @param function $callback The function that will be called
     * 
     */

    public static function post(string $uri, $callback) : void {
        if(self::$REQUEST_ROUTE != null && preg_match("@^" . $uri . "?$@", self::$REQUEST_ROUTE)) {
            self::$NOT_FOUND = false;
            if($_SERVER['REQUEST_METHOD'] === RouteConstants::HTTP_POST) {
                $callback();
            } else {
                DefaultHandler::invalidRequestMethod();
            }
        }
    }

    /**
     * Default handler for put routes
     * 
     * @param string $uri The requested route
     * @param function $callback The function that will be called
     * 
     */

    public static function put(string $uri, $callback) : void {
        if(self::$REQUEST_ROUTE != null && preg_match("@^" . $uri . "?$@", self::$REQUEST_ROUTE)) {
            self::$NOT_FOUND = false;
            if($_SERVER['REQUEST_METHOD'] === RouteConstants::HTTP_PUT) {
                $callback();
            } else {
                DefaultHandler::invalidRequestMethod();
            }
        }
    }

    /**
     * Default handler for delete routes
     * 
     * @param string $uri The requested route
     * @param function $callback The function that will be called
     * 
     */

    public static function delete(string $uri, $callback) : void {
        if(self::$REQUEST_ROUTE != null && preg_match("@^" . $uri . "?$@", self::$REQUEST_ROUTE)) {
            self::$NOT_FOUND = false;
            if($_SERVER['REQUEST_METHOD'] === RouteConstants::HTTP_DELETE) {
                $callback();
            } else {
                DefaultHandler::invalidRequestMethod();
            }
        }
    }

    /**
     * Default handler for all request methods
     * 
     * @param string $uri The requested route
     * @param function $callback The function that will be called 
     * 
     */

    public static function all(string $uri, $callback) : void {
        if(self::$REQUEST_ROUTE != null && preg_match("@^" . $uri . "?$@", self::$REQUEST_ROUTE)) {
            self::$NOT_FOUND = false;
            $callback();
        }
    }

    /**
     * Default handler for multiple request methods
     * 
     * @param array $methods The allowed methods
     * @param string $uri The requested route
     * @param function $callback The function that will be called 
     * 
     */

    public static function multiple(array $methods, string $uri, $callback) : void {
        if(self::$REQUEST_ROUTE != null && preg_match("@^" . $uri . "?$@", self::$REQUEST_ROUTE)) {
            self::$NOT_FOUND = false;
            if(Util::inArray($_SERVER['REQUEST_METHOD'], $methods)) {
                $callback();
            } else {
                DefaultHandler::invalidRequestMethod();
            }
        } 
    }

    /*
     * The default function that gets called
     * when the requested Route has not been found
     */
    
    public static function notFound() : void {
        if(self::$NOT_FOUND) {
            View::json(DefaultHandler::routeNotFound());
        }
    }

    /**
     * Setter for the variable $NOT_FOUND
     * 
     * @param bool $notFound
     */

    public static function setNotFound(bool $notFound) : void {
        self::$NOT_FOUND = $notFound;
    }

    /**
     * Getter for the request route
     * 
     * @return string the request route
     */

    public static function getRequestRoute() : string {
        return self::$REQUEST_ROUTE;
    }

}

?>