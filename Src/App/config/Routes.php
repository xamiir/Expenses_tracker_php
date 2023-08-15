<?php

declare(strict_types=1);

namespace App\config;

use Framework\App;
use App\Controllers\{HomeController, AboutController};





function registerRoutes(App $app)
{
    $app->get("/", [HomeController::class, "index"]);
    $app->get("/about", [AboutController::class, "About"]);
}
