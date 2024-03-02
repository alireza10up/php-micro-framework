<?php

namespace App\Middlewares;

use App\Core\Request;
use App\Middlewares\Contract\MiddlewareInterface;

class ExampleMiddleware implements MiddlewareInterface
{
    #[\Override] public function handle(Request $request): void
    {
        echo '</br>' . 'Example Middleware Class Implement' . '</br>';
    }
}