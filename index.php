<?php

# autoload

include 'bootstrap/init.php';

use App\Core\Request;

$request = new Request();

dd($_ENV);

dd($request->name);