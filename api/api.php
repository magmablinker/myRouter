<?php

include("autoloader.php");

$session = Session::getInstance();

Route::all("/", function(){
    return DefaultPage::json();
});

?>