<?php
require_once __DIR__ ."/../vendor/autoload.php";

use App\controllers\Controller;
use App\controllers\HomeController;
use App\Route;
Route::get("/", function(){
    echo "Home PAGE";
});

Route::get("/contact", function(){
    echo "contact PAGE";
});
Route::get("/about", function(){
    echo "about PAGE";
});
Route::get("/data", function(){
    echo "aaaaaa PAGE";
});
Route::post("/contact", function(){
    echo "contactaaaaaa PAGE";
});

Route::get('/home', [HomeController::class, 'index']);

Route::run();