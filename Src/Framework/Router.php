<?php

declare(strict_types=1);

namespace Framework;

use ReflectionClass;

class Router

{

    private array $routes = [];
    private array $middlewares = [];
    public function add(String $path, String $method, array $controller)
    {
        $path = $this->normalizepath($path);

        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method),
            'controller' => $controller,


        ];
    }
    private function normalizepath(string $path): string
    {
        return trim($path, '/');
    }


    public function dispatch(string $method, string $path, Container $container)
    {
        $path = $this->normalizepath($path);
        $method = strtoupper($method);




        foreach ($this->routes as $route) {

            if (
                !preg_match("#^{$route['path']}$#", $path,) ||
                $route['method'] !== $method
            ) {
                continue;
            }
            [$class, $action] = $route['controller'];
            $controller = $container ? $container->resolve($class) : new $class;
            $controller->{$action}();
        }
    }
    public function addMiddleware(string  $middlewares)
    {
        $this->middlewares[] = $middlewares;
    }
}
