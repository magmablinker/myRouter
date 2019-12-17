<?php

include("autoloader.php");

$session = Session::getInstance();

Route::get("/", function() {
    include("views/index.html");
    die();
});

Route::all("/api", function(){
    return DefaultPage::json();
});

?>