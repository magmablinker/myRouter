<?php

include("autoloader.php");

Route::all("/", function(){
    return DefaultPage::json();
});

?>