<?php

namespace App\Core\Service;

class Router
{
    private array $routes = [
        [
            'path' => '/',
            'controller' => 'App\Controller\MainController::home',
        ],
        [
            'path' => '/about',
            'controller' => 'App\Controller\MainController::about',
        ],
        [
            'path' => '/movies',
            'controller' => 'App\Controller\MovieController::list',
        ],
        [
            'path' => '/movie',
            'controller' => 'App\Controller\MovieController::show',
        ],
    ];

    public function match(string $path): ?string
    {
        foreach ($this->routes as $route) {
            if ($path === $route['path']) {
                return $route['controller'];
            }
        }

        return null;
    }
}
