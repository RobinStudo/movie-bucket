<?php

namespace App\Core\Service;

use App\Core\Model\Route;
use App\Core\Util\UrlHelper;

class Router
{
    private const CONFIG_FILE = 'routes';
    private array $routes;

    public function __construct(private ConfigurationProvider $configurationProvider)
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

    public function generateUrl(string $routeName): string
    {
        $route = $this->routes[$routeName];

        return sprintf('%sindex.php%s', UrlHelper::getBasePath(), $route->getPath());
    }

    private function loadRoutes(): void
    {
        $arrayRoutes = $this->configurationProvider->load(self::CONFIG_FILE);

        foreach ($arrayRoutes as $routeName => $arrayRoute) {
            $this->routes[$routeName] = new Route($routeName, $arrayRoute['path'], $arrayRoute['controller']);
        }
    }
}
