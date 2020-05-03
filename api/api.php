<?php

include("autoloader.php");

$session = Session::getInstance();

Route::all("/api/", function(){
    return DefaultPage::json();
});

Route::get("/api/middleware/test", function() {
    View::json(DefaultHandler::responseOk("Middleware is working"));
}, "Test::exampleMiddleware");

?>