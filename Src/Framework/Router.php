<?php

declare(strict_types=1);

namespace Framework;

class Router

{

    private array $routes = [];
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


    public function dispatch(string $method, string $path)
    {
        $path = $this->normalizepath($path);
        $method = strtoupper($method);


        // foreach ($this->routes as $route) {
        //     if ($route['path'] === $path && $route['method'] === $method) {
        //         continue;
        //     }
        //     echo "ok";

        //     [$controller, $action] = $route['controller'];
        //     $controllers = new $controller();
        //     $controllers->{$action}();
        //     return;
        // }

        foreach ($this->routes as $route) {

            if (
                !preg_match("#^{$route['path']}$#", $path,) ||
                $route['method'] !== $method
            ) {
                continue;
            }
            [$class, $action] = $route['controller'];
            $controller = new $class();
            $controller->{$action}();
        }
    }
}
