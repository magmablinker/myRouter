<?php

abstract class View {

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
    
    public static function json($json) {
        header(RouteConstants::CONTENT_TYPE_JSON);
        print(json_encode($json));
    }

}

?>