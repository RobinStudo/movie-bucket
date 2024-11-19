<?php

namespace App\Core\Service;

use App\Core\Model\Route;

class Router
{
    private const CONFIG_FILE = 'routes';
    private array $routes;

    public function __construct()
    {
        $this->loadRoutes();
    }

    public function match(string $path): ?Route
    {
        foreach ($this->routes as $route) {
            if ($path === $route->getPath()) {
                return $route;
            }
        }

        return null;
    }

    private function loadRoutes(): void
    {
        $configProvider = new ConfigurationProvider();
        $arrayRoutes = $configProvider->load(self::CONFIG_FILE);

        foreach ($arrayRoutes as $routeName => $arrayRoute) {
            $this->routes[] = new Route($routeName, $arrayRoute['path'], $arrayRoute['controller']);
        }
    }
}
