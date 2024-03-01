<?php

use App\Controllers\ExampleController;
use App\Core\Routing\Route;

Route::get('/test/{id}', function (\App\Core\Request $request) {
    dd($request);
});

Route::get('/example/{id}', function () {
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

Route::get('/example/{slug}/oneParam', [ExampleController::class, 'oneParam']);
Route::get('/example/{slug}/comments/{id}', [ExampleController::class, 'index']);

Route::get('/', function () {
    echo 'im in /';
}, [App\Middleware\ExampleMiddleware::class]);

// Route::get('/', [ExampleController::class, 'index'], [\App\Middleware\ExampleMiddleware::class]);
// Route::get('/', 'ExampleController@index');
// Route::get('/', fn() => echo 'foo');