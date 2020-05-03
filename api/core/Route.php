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
     * Default method for matching routes
     * 
     * @param string $uri The requested route
     * @param mixed $method, either a string or an array of allowed http methods
     * @param function $callback The function that will be called
     * @param function $middleware The middleware that will be called before the $callback
     */

    private static function matchRoute(string $uri, $method, $callback, $middleware = null) : void {
        if(self::$REQUEST_ROUTE != null && preg_match("@^" . $uri . "?$@", self::$REQUEST_ROUTE)) {
            self::$NOT_FOUND = false;

            if($_SERVER['REQUEST_METHOD'] === $method || ((is_array($method)) && in_array($_SERVER['REQUEST_METHOD'], $method))) {
                if(is_null($middleware)) {
                    $callback();
                } else {
                    $middleware($callback);
                }
            } else {
                DefaultHandler::invalidRequestMethod();
            }
        }
    }

    /**
     * Default helper method for GET routes
     * 
     * @param string $uri The requested route
     * @param function $callback The function that will be called
     * @param function $middleware The middleware that will be called before the $callback
     * 
     */

    public static function get(string $uri, $callback, $middleware = null) : void {
        self::matchRoute($uri, RouteConstants::HTTP_GET, $callback, $middleware);
    }

    /**
     * Default helper method for post routes
     * 
     * @param string $uri The requested route
     * @param function $callback The function that will be called
     * @param function $middleware The middleware that will be called before the $callback
     * 
     */

    public static function post(string $uri, $callback, $middleware = null) : void {
        self::matchRoute($uri, RouteConstants::HTTP_POST, $callback, $middleware);
    }

    /**
     * Default helper method for put routes
     * 
     * @param string $uri The requested route
     * @param function $callback The function that will be called
     * @param function $middleware The middleware that will be called before the $callback
     * 
     */

    public static function put(string $uri, $callback, $middleware = null) : void {
        self::matchRoute($uri, RouteConstants::HTTP_PUT, $callback, $middleware);
    }

    /**
     * Default helper method for delete routes
     * 
     * @param string $uri The requested route
     * @param function $callback The function that will be called
     * @param function $middleware The middleware that will be called before the $callback
     * 
     */

    public static function delete(string $uri, $callback, $middleware = null) : void {
        self::matchRoute($uri, RouteConstants::HTTP_DELETE, $callback, $middleware);
    }

    /**
     * Default helper method for all request methods
     * 
     * @param string $uri The requested route
     * @param function $callback The function that will be called 
     * @param function $middleware The middleware that will be called before the $callback
     * 
     */

    public static function all(string $uri, $callback, $middleware = null) : void {
        self::matchRoute($uri, [ RouteConstants::HTTP_GET, RouteConstants::HTTP_POST, RouteConstants::HTTP_PUT, RouteConstants::HTTP_DELETE ], $callback, $middleware);
    }

    /**
     * Default helper method for multiple request methods
     * 
     * @param array $methods The allowed methods
     * @param string $uri The requested route
     * @param function $callback The function that will be called 
     * @param function $middleware The middleware that will be called before the $callback
     * 
     */

    public static function multiple(array $methods, string $uri, $callback, $middleware = null) : void {
        self::matchRoute($uri, $methods, $callback, $middleware);
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