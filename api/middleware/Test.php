<?php

class Test {

    public static function exampleMiddleware($next) {

        if(rand(1, 1000) % 2 == 0) {
            $next();
        } else {
            View::json(DefaultHandler::unauthorizedAccess());
        }

    }

}

?>