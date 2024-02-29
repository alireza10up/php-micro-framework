<?php

namespace App\Core\Routing;

class Route
{
    public static array $routes = [];
    private static array $verbs = ['get', 'post', 'patch', 'put', 'delete', 'option'];

    public static function __callStatic($method, $args)
    {
        if (!in_array($method, self::$verbs)) throw new \Exception('method not support !');
        self::add($method, $args[0], $args[1], $args[2] ?? null);
    }

    public static function add(array|string $methods, string $uri, $action, $middlewares = null): void
    {
        $methods = is_array($methods) ? $methods : [$methods];
        $middlewares = is_array($middlewares) ? $middlewares : [$middlewares];
        self::$routes[] = $route = ['methods' => $methods, 'uri' => $uri, 'action' => $action, 'middlewares' => $middlewares];
    }

    public static function routes(): array
    {
        return self::$routes;
    }
}