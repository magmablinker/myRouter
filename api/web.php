<?php

include("autoloader.php");

Route::get("/", function() {
    View::html("views/index.html");
});

?>