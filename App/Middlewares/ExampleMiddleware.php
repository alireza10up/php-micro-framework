<?php

namespace App\Middlewares;

use App\Core\Http\Request;
use App\Middlewares\Contract\MiddlewareInterface;

class ExampleMiddleware implements MiddlewareInterface
{
    #[\Override] public function handle(Request $request, array $params = null): void
    {
        echo '</br>' . 'Example Middleware Class Implement' . '</br>';
    }
}
