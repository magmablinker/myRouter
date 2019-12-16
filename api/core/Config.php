<?php

class Config {

    /*
     * This config class has to be adjusted
     * depending on your application
     */

    # Basic configuration
    const HOST_NAME = "localhost";
    const APP_NAME = "myRouter";
    const APP_VERSION = "0.0.3";
    const SESSION_EXPIRES = 15; # The value is in minutes
    const MAX_REQUESTS_SECOND = 1; # The treshold for requests in seconds
    const FORCE_HTTPS = false;

    # Database configuration
    const DB_HOST = null;
    const DB_DATABASE = "y";
    const DB_USER = null;
    const DB_PASSWORD = null;

    # Login configuration
    const DB_USER_TABLE = null; # e.g "tUser"
    const DB_USERNAME_ROW = null; # e.g "username"
    const DB_PASSWORD_ROW = null; # e.g "password"

}

?>