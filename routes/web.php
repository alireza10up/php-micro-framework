<?php

use App\Core\Routing\Route;

Route::post('/a', function () {
    return 'بهزاد مادر خراب';
});

Route::get('/b', function () {
    return 'سلامتی ساقی';
});
Route::delete('/c', function () {
    return 'هرکس هس سلام';
});

foreach(Route::routes() as $route) {
    dd($route['action']());
};