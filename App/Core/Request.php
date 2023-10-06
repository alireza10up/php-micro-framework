<?php

namespace App\Core;

class Request
{
    private $params;
    private $method;
    private $agent;
    private $ip;
    private $uri;

    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    public function __get($name)
    {
        return $this->params[$name] ?? null;
    }

    public function params()
    {
        return $this->params();
    }

    public function method()
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

    public function redirect($route)
    {
        header('location:' . site_url($route));
        die();
    }
}