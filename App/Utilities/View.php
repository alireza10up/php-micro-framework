<?php

namespace App\Utilities;

class View
{
    public static function get($name): string
    {
        return BASE_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $name;
    }
}