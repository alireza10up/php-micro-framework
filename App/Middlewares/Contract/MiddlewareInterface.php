<?php

namespace App\Middlewares\Contract;
use App\Core\Request;

interface MiddlewareInterface
{
    public function handle(Request $request);
}