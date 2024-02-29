<?php

use App\Controllers\ExampleController;
use App\Core\Routing\Route;

Route::get('/', function () {
    $userData = [
        'name' => 'alireza',
        'family' => 'vahdani'
    ];

    view('index', compact('userData'));
}, [
    App\Middleware\ExampleMiddleware::class,
    function () {
        echo '</br>' . 'Example Middleware Closure / Callback' . '</br>';
    }
]);

// Route::get('/', [ExampleController::class, 'index'], [\App\Middleware\ExampleMiddleware::class]);
// Route::get('/', 'ExampleController@index');
// Route::get('/', fn() => echo 'foo');