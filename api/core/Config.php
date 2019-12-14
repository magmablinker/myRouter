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
    const MAX_REQUESTS_SECOND = 1; # Max requests per second

    # Database configuration
    const DB_HOST = null;
    const DB_DATABASE = null;
    const DB_USER = null;
    const DB_PASSWORD = null;

}

?>