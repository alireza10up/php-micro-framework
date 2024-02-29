<?php

# autoload

include 'bootstrap/init.php';

global $request;
$router = new \App\Core\Routing\Router($request);

$router->run();