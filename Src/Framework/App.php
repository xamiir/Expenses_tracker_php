<?php

declare(strict_types=1);

namespace Framework;

class App
{

    private Router $router;
    private Container $container;
    public function __construct(string $DefinitionsPath = null)
    {
        $this->router = new Router();
        $this->container = new Container();
        if ($DefinitionsPath) {
            $definitions = require $DefinitionsPath;
            $this->container->addDefinitions($definitions);
        }
    }

    public function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        $this->router->dispatch($path, $method, $this->container);
    }

    // public function getRouter(): Router
    // {
    //     return $this->router;
    // }
    public function get(string $path, array $controller)
    {
        $this->router->add("GET", $path,  $controller);

        // $this->router->add($path, "GEt", $controller);
    }

    public function post(string $path, array $controller)
    {
        $this->router->add("POST", $path,  $controller);

        // $this->router->add($path, "GEt", $controller);
    }

    public function addMiddleware(string $middlewares)
    {
        $this->router->addMiddleware($middlewares);
    }
};
