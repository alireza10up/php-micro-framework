<?php

namespace App\Core;

class Request
{
    private $params;
    private $method;
    private $agent;
    private $ip;
    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
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

    public function input($key)
    {
        return $this->params[$key] ?? null;
    }

    public function has($key)
    {
        return isset($this->params[$key]);
    }

    public function redirect($route)
    {
        header('location:' . site_url($route));
        die();
    }

    public function __get($key)
    {
        return $this->params[$key] ?? null;
    }
}