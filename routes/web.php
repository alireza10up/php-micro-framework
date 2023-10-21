<?php

use App\Core\Routing\Route;

Route::post('/a', function () {
    return 'بهزاد مادر خراب';
});

Route::get('/b', function () {
    echo 'سلامتی ساقی';
});

Route::delete('/c', function () {
    return 'هرکس هس سلام';
});

Route::get('/d', [HomeController::class,'index']);
Route::get('/e', 'HomeController@index');
Route::get('/f', 'Home@index');