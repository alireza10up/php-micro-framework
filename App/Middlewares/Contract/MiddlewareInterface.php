<?php

namespace App\Middlewares\Contract;

use App\Core\Http\Request;

interface MiddlewareInterface
{
    public function handle(Request $request, array $params = null);
}