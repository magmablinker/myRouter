<?php

include("autoloader.php");

Route::all("/", function(){
    return DefaultPage::json();
});

Route::multiple(["GET", "POST"], "/exampleRoute", function(){
    if($_SERVER['REQUEST_METHOD'] === RouteConstants::HTTP_GET) {
        return ExampleRoute::html();
    } else {
        return ExampleRoute::json();
    }
});

Route::get("/otherRoute", function(){
    return OtherRoute::html();
});

?>