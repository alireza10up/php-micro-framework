<?php

namespace App\Core\Routing;

use App\Core\Request;
use JetBrains\PhpStorm\NoReturn;

class Router
{
    private Request $request;
    private array $routes;
    private array|null $current_route;
    const BASE_CONTROLLER = 'App\Controllers\\';

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request);
    }

    private function findRoute(Request $request): array|null
    {
        foreach ($this->routes as $route) {
            if ($request->uri() == $route['uri']) {
                if (in_array($request->method(), $route['methods'])) {
                    return $route;
                }
                $this->dispatch405();
            }
        }
        return null;
    }

    public function run(): void
    {
        # uri not exists 404
        if (is_null($this->current_route)) $this->dispatch404();
        # dispatching
        $this->dispatch($this->current_route);
    }

    private function dispatch($route): void
    {
        $action = $route['action'];
        # action : null
        if (empty($action)) return;
        # action : closure
        if (is_callable($action)) $action();
        # action : controller@method => [controller , method]
        if (is_string($action) && str_contains($action, '@')) $action = explode('@', $action);
        # action : [controller , method]
        if (is_array($action)) {
            $class_name = self::BASE_CONTROLLER . $action[0];
            $method = $action[1];
            if (!class_exists($class_name)) throw new \Exception('Class ' . $class_name . ' Not Found !');
            $controller = new $class_name;
            if (!method_exists($controller, $method)) throw new \Exception('Method ' . $method . ' Not Exits In Class ' . $class_name);
            $controller->{$method}();
        }
    }

    #[NoReturn] private function dispatch404(): void
    {
        header("HTTP/1.0 404 Not Found");
        echo '404 : not found';
        die();
    }

    #[NoReturn] private function dispatch405(): void
    {
        header("HTTP/1.0 405 Method Not Allowed");
        echo '405 : method not allowed';
        die();
    }
}