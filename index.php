<?php

# autoload

include 'bootstrap/init.php';

use App\Core\Request;
use App\Core\StupidRouter;
use App\Utilities\Assets;
use App\Utilities\Url;
use App\Utilities\View;

echo Assets::CSS('style.js');
echo '<hr>';
echo Url::current();
echo '<hr>';
echo Url::current_route();
echo '<hr>';

// request

$request = new Request();
dd($request);

dd($request->name);

// router

$router = new StupidRouter();
$router->run();
