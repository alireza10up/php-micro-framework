<?php

# autoload

include 'bootstrap/init.php';

use App\Utilities\Assets;
use App\Utilities\Url;

// echo Assets::CSS('style.js'); 
echo Url::current();