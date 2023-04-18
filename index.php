<?php

# autoload

include 'bootstrap/init.php';

use App\Core\StupidRouter;
use App\Utilities\Assets;
use App\Utilities\Url;
use App\Utilities\View;

echo Assets::CSS('style.js');
echo '<hr>';
echo Url::current();
echo '<hr>';

// router

// $route = Url::current_route();

// include match ($route) {
//     "/microFramework/colors/blue" => View::get('colors/blue.php'),
//     "/microFramework/colors/green" => View::get('colors/green.php'),
//     "/microFramework/colors/red" => View::get('colors/red.php'),
//     default => View::get('leaderboard.php'),
// };

$router = new StupidRouter();
$router->run();