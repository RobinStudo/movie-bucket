<?php

namespace App\Core\Util;

class UrlHelper
{
    public static function getBasePath(): string
    {
        $path = dirname($_SERVER['SCRIPT_NAME']);

        if (!str_ends_with($path, '/')) {
            $path .= '/';
        }

        return $path;
    }
}
