<?php

namespace App\Console\Commands;

readonly class Serve
{
    private string $host;
    private string $port;

    public function __construct()
    {
        $this->host = $_ENV['HOST_URL'] ?? '127.0.0.1';
        $this->port = $_ENV['PORT_URL'] ?? '8585';
    }

    public function handle(): void
    {
        exec("php -S {$this->host}:{$this->port} -t ./public");
    }
}