<?php

# autoload

include 'vendor/autoload.php';

# front controller

echo $_SERVER['REQUEST_URI'];

new App\Core\Request();