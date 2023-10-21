<?php

# autoload

include 'bootstrap/init.php';

$router = new \App\Core\Routing\Router($request);

$router->run();