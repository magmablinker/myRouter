<?php

abstract class View {

    /*
     * Function that returns json text
     * to the client that made the request.
     * You have to override this function in it's
     * children.
     * 
     * @param $json the json that will be printed
     */

    public static function json($json) {
        Route::setNotFound(false);
        header(RouteConstants::CONTENT_TYPE_JSON);
        print(json_encode($json));
        die();
    }

}

?>