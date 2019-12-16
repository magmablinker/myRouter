<?php

/*
 *
 * @author pmma_
 * @date 16.12.2019
 * 
 */

class Cookie {

    /*
     * Function to set a cookie
     * 
     * @param $name string the name of the cookie
     * @param $value string the value of the cookie
     * @param $expires int the time when the cookie expires in minutes
     * @param $path string the path of the cookie, default is /
     */

    public static function setCookie(string $name, $value, int $expires, string $path = "/") : void {
        setcookie($name, $value, (time() + (60 * $expires)), $path);
    }

    /*
     * Function to get a cookie
     * 
     * @param $name string the name of the cookie
     */

    public static function getCookie(string $name) {
        return $_COOKIE[$name];
    }

    /*
     * Function to remove a cookie
     * 
     * @param $name string the name of the cookie
     * @param $path string the path of the cookie, default is /
     */

    public static function removeCookie(string $name, string $path = "/") : void {
        setcookie($name, "", 0, $path);
    }

}

?>