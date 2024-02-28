<?php

use App\Core\Routing\Route;

Route::get('/', function () {
    $userData = [
        'name' => 'alireza',
        'family' => 'vahdani'
    ];

    return view('layouts.index', compact('userData'));
});

Route::get('/d', [HomeController::class, 'index']);
Route::get('/e', 'HomeController@index');
Route::get('/f', 'Home@index');