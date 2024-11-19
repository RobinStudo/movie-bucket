<?php

namespace App\Core;

use App\Core\Service\Router;
use DI\Container;

class Kernel
{
    private Container $container;

    public function __construct()
    {
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);

        $this->container = new Container();
    }

    public function run(): void
    {
        $path = $_SERVER['PATH_INFO'] ?? '/';

        $router = new Router();
        $route = $router->match($path);
        $controllerFragments = explode('::', $route->getController());
        $controllerClass = $controllerFragments[0];
        $controllerMethod = $controllerFragments[1];

        $controller = $this->container->get($controllerClass);
        $controller->$controllerMethod();
    }
}
