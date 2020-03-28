<?php

/**
 *
 * @author pmma_
 * @since 04.10.2019
 * 
 */

abstract class View {

    /**
     * Function that returns json text
     * to the client that made the request.
     * 
     * @param json the json that will be printed
     */

    public static function json($json) {
        Route::setNotFound(false); // Just to be sure
        header(RouteConstants::CONTENT_TYPE_JSON);
        print(json_encode($json));
        die();
    }

    /**
     * Function that returns a html or php file 
     * 
     * @param file the file that will be included
     */

    public static function html($file) {
        Route::setNotFound(false); // Just to be sure
        Controller::setResponseCode(HttpResponseCodes::HTTP_OK);
        header(RouteConstants::CONTENT_TYPE_TEXT);
        include($file);
        die();
    }

}

?>