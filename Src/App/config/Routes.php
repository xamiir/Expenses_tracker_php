<?php

declare(strict_types=1);

namespace App\config;

use Framework\App;
use App\Controllers\{HomeController, AboutController, AuthControllers};





function registerRoutes(App $app)
{
    $app->get("/", [HomeController::class, "index"]);
    $app->get("/about", [AboutController::class, "About"]);
    $app->get("/register", [AuthControllers::class, "registerView"]);
    $app->post("/register", [AuthControllers::class, "register"]);
}
