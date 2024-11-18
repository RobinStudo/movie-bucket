<?php

namespace App\Core\Util;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(self::load(...));
    }

    public static function load(string $class): void
    {
        $class = str_replace('App', 'src', $class);
        $class = str_replace('\\', '/', $class);
        $class = sprintf('../%s.php', $class);

        require_once $class;
    }
}
