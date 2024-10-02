<?php

namespace App\Console\Commands;

use App\Core\Routing\Route;

class RouteList {
    public function handle(): string
    {
        $routes = Route::routes();
        // dd(Route::routes());
        if (empty($routes)) {
            return 'No routes found.';
        }
        // titles
        $output = str_pad("Method", 10) . str_pad("URI", 30) . "Action" . PHP_EOL;
        $output .= str_repeat("-", 50) . PHP_EOL;
        
        foreach ($routes as $route) {
            $methods = implode(',', $route['methods']);
            // dd($route['methods']);
            $uri = $route['uri'];
            $action = is_string($route['action']) ? $route['action'] : 'Closure';

            $output .= str_pad(strtoupper($methods), 10) . str_pad($uri, 30) . $action . PHP_EOL;
        }

        return $output;
    }
}
