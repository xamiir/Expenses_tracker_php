<?php

declare(strict_types=1);

//include __DIR__ . "/../Framework/App.php";
require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;


use function App\config\registerRoutes;


$app = new App();

registerRoutes($app);




// $app->get("/", [HomeController::class, "home"]);

// $app->getRouter()->add("/");



return $app;
