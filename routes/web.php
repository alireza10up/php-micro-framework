<?php

use App\Core\Routing\Route;

Route::post('/get', function () {
    return 'بهزاد مادر خراب';
});

Route::get('/get', function () {
    return 'سلامتی ساقی';
});
Route::delete('/get', function () {
    return 'هرکس هس سلام';
});
Route::slam('/get', function () {
    return 'هرکس هس سلام';
});
foreach(Route::routes() as $route) {
    dd($route['action']());
};