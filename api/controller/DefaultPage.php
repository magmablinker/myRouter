<?php

class DefaultPage extends Controller {

    /*
     * The DefaultPage json method returns some
     * information about your api
     */
    public static function json() {
        $session = Session::getInstance();
        return View::json(array(
            "info" => array(
                "route" => Route::$REQUEST_ROUTE,
                "controller" => get_class() . " Controller",
                "rate limit" => $session->getSessionVar("RATE_LIMIT")
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
                    )
                ),
            )
        ));
    }

}

?>