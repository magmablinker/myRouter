<?php

/*
 * ToDo:
 * ##########
 * # Fix weird bug in uridecoder 
 * ##########
 */

include("autoloader.php");

# We have to do this because we can't assign
# static variables dynamically without helper
Route::build();

Route::all("/", function(){
    return View::json(DefaultPage::json());
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