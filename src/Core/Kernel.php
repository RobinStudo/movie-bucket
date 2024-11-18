<?php

namespace App\Core;

use App\Core\Service\Router;

class Kernel
{
    public function run(): void
    {
        $path = $_SERVER['PATH_INFO'] ?? '/';

        $router = new Router();
        $controllerName = $router->match($path);
        $controllerFragments = explode('::', $controllerName);
        $controllerClass = $controllerFragments[0];
        $controllerMethod = $controllerFragments[1];

        $controller = new $controllerClass();
        $controller->$controllerMethod();
    }
}
