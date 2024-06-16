<?php

namespace App\Core\Http;

use JetBrains\PhpStorm\NoReturn;

final class Request
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
        $this->uri = strtok($_SERVER['REQUEST_URI'] ?? '', '?');
    }

    /**
     * not exist member handle
     * search in params and return
     * 
     * @param string $name 
     * @return mixed
     */
    public function __get($name): mixed
    {
        return $this->params[$name] ?? null;
    }

    /**
     * getter params
     * 
     * @return array
     */
    public function params(): array
    {
        return $this->params;
    }

    /**
     * getter method
     * 
     * @return string
     */
    public function method(): string
    {
        return $this->method;
    }

    /**
     * getter agent
     * 
     * @return string
     */
    public function agent()
    {
        return $this->agent;
    }

    /**
     * getter ip
     * 
     * @return string
     */
    public function ip()
    {
        return $this->ip;
    }

    /**
     * getter url
     * 
     * @return string
     */
    public function uri()
    {
        return $this->uri;
    }

    /**
     * get special key in params , if not exist replace with default
     * 
     * @param string $key 
     * @param mixed $default
     */
    public function input($key, $default = null)
    {
        return $this->params[$key] ?? $default;
    }

    /**
     * check in params has a key
     * 
     * @param string $key
     * @return bool
     */
    public function has($key): bool
    {
        return isset($this->params[$key]);
    }

    /**
     * redirect and die
     * 
     * @param string $route 
     * @return void
     */
    public function redirect($route): void
    {
        header('location:' . site_url($route));
        die();
    }
}
