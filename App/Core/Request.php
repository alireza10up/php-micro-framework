<?php

namespace App\Core;

use JetBrains\PhpStorm\NoReturn;

class Request
{
    private array $params;
    private string $method;
    private mixed $agent;
    private string $ip;
    private string $uri;

    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $this->method = strtolower($_SERVER['REQUEST_METHOD'] ?? '');
        $this->ip = $_SERVER['REMOTE_ADDR'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';
    }

    public function __get($name)
    {
        return $this->params[$name] ?? null;
    }

    public function params()
    {
        return $this->params();
    }

    public function method(): string
    {
        return $this->method;
    }

    public function agent()
    {
        return $this->agent;
    }

    public function ip()
    {
        return $this->ip;
    }

    public function uri()
    {
        return $this->uri;
    }

    public function input($key, $default = null)
    {
        return $this->params[$key] ?? $default;
    }

    public function has($key): bool
    {
        return isset($this->params[$key]);
    }

    #[NoReturn] public function redirect($route): void
    {
        header('location:' . site_url($route));
        die();
    }
}