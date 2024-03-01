<?php

namespace App\Middleware;

use App\Core\Request;
use App\Middleware\Contract\MiddlewareInterface;

class ExampleMiddleware implements MiddlewareInterface
{
    #[\Override] public function handle(Request $request): void
    {
        echo '</br>' . 'Example Middleware Class Implement' . '</br>';
    }
}