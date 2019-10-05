<?php

abstract class View {

    /*
     * Function that returns html text
     * to the client that made the request.
     * You have to override this function in it's
     * children.
     * 
     * @param $text the text that will be rendered
     */
    public static function render($text) {
        print(sprintf(
            '<!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>Document</title>
                </head>
                <body>
                    %s
                </body>
            </html>', $text));
    }
    
    /*
     * Function that returns json text
     * to the client that made the request.
     * You have to override this function in it's
     * children.
     * 
     * @param $json the json that will be printed
     */
    public static function json($json) {
        header(RouteConstants::CONTENT_TYPE_JSON);
        print(json_encode($json));
    }

}

?>