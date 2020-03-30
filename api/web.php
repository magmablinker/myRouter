<?php

include("autoloader.php");

Route::get("/", function() {
    include("views/index.html");
    die();
});

?>