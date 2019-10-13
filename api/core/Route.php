<?php

/*
 *
 * @author pmma_
 * @date 04.10.2019
 * @version 0.0.2
 * 
 */

class Route {

    public static $REQUEST_ROUTE = null;
    private static $NOT_FOUND = true;
    
    /* 
     * We need this helper function since we can't
     * assign static variables dynamically in php
     */

    public static function build() {
        if(self::$REQUEST_ROUTE === null) {
            self::$REQUEST_ROUTE = new URIDecoder($_SERVER['REQUEST_URI']);
        }
    }

    /*
     * Default handler for get routes
     * 
     * @param $uri The requested route
     * @param $callback The function that will be called
     * 
     */

    public static function get($uri, $callback) {
        if(self::$REQUEST_ROUTE != null && self::$REQUEST_ROUTE->getRoute() == $uri) {
            if($_SERVER['REQUEST_METHOD'] === RouteConstants::HTTP_GET) {
                self::$NOT_FOUND = false;
                $callback();
            } else {
                self::$NOT_FOUND = false;
                DefaultHandler::invalidRequestMethod();
            }
        }
    }

    /*
     * Default handler for post routes
     * 
     * @param $uri The requested route
     * @param $callback The function that will be called
     * 
     */

    public static function post($uri, $callback) {
        if(self::$REQUEST_ROUTE != null && self::$REQUEST_ROUTE->getRoute() == $uri) {
            if($_SERVER['REQUEST_METHOD'] === RouteConstants::HTTP_POST) {
                self::$NOT_FOUND = false;
                $callback();
            } else {
                self::$NOT_FOUND = false;
                DefaultHandler::invalidRequestMethod();
            }
        }
    }

    /*
     * Default handler for put routes
     * 
     * @param $uri The requested route
     * @param $callback The function that will be called
     * 
     */

    public static function put($uri, $callback) {
        if(self::$REQUEST_ROUTE != null && self::$REQUEST_ROUTE->getRoute() == $uri) {
            if($_SERVER['REQUEST_METHOD'] === RouteConstants::HTTP_PUT) {
                self::$NOT_FOUND = false;
                $callback();
            } else {
                self::$NOT_FOUND = false;
                DefaultHandler::invalidRequestMethod();
            }
        }
    }

    /*
     * Default handler for delete routes
     * 
     * @param $uri The requested route
     * @param $callback The function that will be called
     * 
     */

    public static function delete($uri, $callback) {
        if(self::$REQUEST_ROUTE != null && self::$REQUEST_ROUTE->getRoute() == $uri) {
            if($_SERVER['REQUEST_METHOD'] === RouteConstants::HTTP_DELETE) {
                self::$NOT_FOUND = false;
                $callback();
            } else {
                self::$NOT_FOUND = false;
                DefaultHandler::invalidRequestMethod();
            }
        }
    }

    /*
     * Default handler for all request methods
     * 
     * @param $methods The allowed methods (array)
     * @param $uri The requested route
     * @param $callback The function that will be called 
     * 
     */

    public static function all($uri, $callback) {
        if(self::$REQUEST_ROUTE != null && self::$REQUEST_ROUTE->getRoute() == $uri) {
            self::$NOT_FOUND = false;
            $callback();
        }
    }

    /*
     * Default handler for multiple request methods
     * 
     * @param $methods The allowed methods (array)
     * @param $uri The requested route
     * @param $callback The function that will be called 
     * 
     */

    public static function multiple($methods, $uri, $callback) {
        if(self::$REQUEST_ROUTE != null && self::$REQUEST_ROUTE->getRoute() == $uri) {
            if(Util::inArray($_SERVER['REQUEST_METHOD'], $methods)) {
                self::$NOT_FOUND = false;
                $callback();
            } else {
                self::$NOT_FOUND = false;
                DefaultHandler::invalidRequestMethod();
            }
        } 
    }

    /*
     * The default function that gets called
     * when the requested Route has not been found
     */
    public static function notFound() {
        if(self::$NOT_FOUND) {
            DefaultHandler::routeNotFound();
        }
    }

}

?>