<?php

namespace App\Middleware\Contract;
use App\Core\Request;

interface MiddlewareInterface
{
    public function handle(Request $request);
}