<?php

namespace App\Utilities;

class Assets
{
    public static function __callStatic($method, $args)
    {
        return $_ENV['BASE_URL'] . "assets/{$method}/{$args[0]}";
    }
}

?>