<?php

namespace App\Middleware;

use App\Middleware\Contract\MiddlewareInterface;

class ExampleMiddleware implements MiddlewareInterface
{
    #[\Override] public function handle(): void
    {
        echo '</br>' . 'Example Middleware Class Implement' . '</br>';
    }
}