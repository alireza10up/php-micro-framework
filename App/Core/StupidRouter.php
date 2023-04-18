<?php

namespace App\Core;

use App\Utilities\Url;

class StupidRouter
{

    private $routes = [
        '/microFramework/colors/blue' => 'colors/blue.php',
        '/microFramework/colors/green' => 'colors/green.php',
        '/microFramework/colors/red' => 'colors/red.php'
    ];

    public function run()
    {
        $current_route = Url::current_route();
        foreach ($this->routes as $route => $view) {
            if ($current_route == $route)
                $this->includeAndDie($view);
        }
        $this->includeAndDie('errors/404.php');
    }

    private function includeAndDie($view)
    {
        include BASE_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $view;
        exit();
    }

}