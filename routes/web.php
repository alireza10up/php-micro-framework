<?php

use App\Controllers\HomeController;
use App\Core\Routing\Route;

Route::get('/', function () {
    $userData = [
        'name' => 'alireza',
        'family' => 'vahdani'
    ];

    return view('layouts.index', compact('userData'));
}, 'middleware');

//Route::get('/', [HomeController::class, 'index'], 'middleware');
//Route::get('/', 'HomeController@index');
//Route::get('/', 'Home@index');