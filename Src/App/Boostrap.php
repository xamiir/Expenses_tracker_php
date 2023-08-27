<?php

declare(strict_types=1);

//include __DIR__ . "/../Framework/App.php";
require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\config\paths;


use function App\config\{registerRoutes, registeMiddleware};


$app = new App(paths::SOURCE . "/App/container-definition.php");

registerRoutes($app);
registeMiddleware($app);




// $app->get("/", [HomeController::class, "home"]);

// $app->getRouter()->add("/");



return $app;
