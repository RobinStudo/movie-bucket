<?php

class Router
{
    private array $routes = [
        [
            'path' => '/',
            'controller' => 'MainController::home',
        ],
        [
            'path' => '/about',
            'controller' => 'MainController::about',
        ],
        [
            'path' => '/movies',
            'controller' => 'MovieController::list',
        ],
        [
            'path' => '/movie',
            'controller' => 'MovieController::show',
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
