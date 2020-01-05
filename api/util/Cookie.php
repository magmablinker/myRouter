<?php

/**
 *
 * @author pmma_
 * @since 16.12.2019
 * 
 */

class Cookie {

    /**
     * Function to set a cookie
     * 
     * @param string $name string the name of the cookie
     * @param string $value string the value of the cookie
     * @param int $expires int the time when the cookie expires in minutes
     * @param string $path string the path of the cookie, default is /
     */

    public static function setCookie(string $name, $value, int $expires, string $path = "/") : void {
        setcookie($name, $value, (time() + (60 * $expires)), $path);
    }

    /**
     * Function to get a cookie
     * 
     * @param string $name the name of the cookie
     */

    public static function getCookie(string $name) {
        return $_COOKIE[$name];
    }

    /**
     * Function to remove a cookie
     * 
     * @param string $name the name of the cookie
     * @param string $path the path of the cookie, default is /
     */

    public static function removeCookie(string $name, string $path = "/") : void {
        setcookie($name, "", 0, $path);
    }

}

?>