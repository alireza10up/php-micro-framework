<?php

namespace App\Core\Routing;

use App\Core\Request;
use App\Core\Routing\Route;

class Router
{
    private Request $request;
    private array $routes;
    private array|null $current_route;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request);
    }

    private function findRoute(Request $request): array|null
    {
        foreach ($this->routes as $route) {
            if (in_array($request->method(), $route['methods']) && $request->uri() == $route['uri']) {
                return $route;
            }
        }
        return null;
    }

    private function run()
    {
        # check invalid request 405
        # uri not exists 404
        # action : null
        # action : closure
        # action : controller@method
        # action : [controller , method]
    }
}