<?php

include("autoloader.php");

$session = Session::getInstance();

Route::all("/api/", function(){
    return DefaultPage::json();
});

?>