<?php

class DefaultPage extends Controller {

    /*
     * The DefaultPage json method returns some
     * information about your api
     */
    public static function json() {
        return View::json(array(
            "info" => array(
                "route" => Route::$REQUEST_ROUTE->getRoute(),
                "controller" => get_class() . " Controller"
            ),
            "data" => array(
                "appName" => Config::APP_NAME,
                "version" => Config::APP_VERSION,
                "availableRoutes" => array(
                    "/" => array(
                        "contentType" => RouteConstants::CONTENT_TYPE_JSON,
                        "info" => "returns info about the api",
                        "allowedMethods" => array(
                            "ALL"
                        ),
                        "authenticationRequired" => false
                    ),
                    "exampleRoute" => array(
                        "contentType" => RouteConstants::CONTENT_TYPE_JSON,
                        "info" => "GET: returns html page view - POST: returns json",
                        "allowedMethods" => array(
                            "GET",
                            "POST"
                        ),
                        "authenticationRequired" => false
                    ),
                    "otherRoute" => array(
                        "contentType" => RouteConstants::CONTENT_TYPE_TEXT,
                        "info" => "returns the otherPage view",
                        "allowedMethods" => array(
                            "GET"
                        ),
                        "authenticationRequired" => false
                    )
                ),
            )
        ));
    }

}

?>