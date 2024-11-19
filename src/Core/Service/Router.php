<?php

namespace App\Core\Service;

use Symfony\Component\Yaml\Yaml;

class Router
{
    private const CONFIG_FILE = '../config/routes.yaml';
    private array $routes;

    public function __construct()
    {
        $this->loadRoutes();
    }

    public function match(string $path): ?string
    {
        foreach ($this->routes as $route) {
            if ($path === $route['path']) {
                return $route['controller'];
            }
        }

        return null;
    }

    private function loadRoutes(): void
    {
        $this->routes = Yaml::parseFile(self::CONFIG_FILE);
    }
}
