<?php

declare(strict_types=1);

namespace App\config;

use Framework\App;

use App\Middleware\TemplateDataMiddleware;

function registeMiddleware(App $app)
{
    $app->addMiddleware(TemplateDataMiddleware::class);
}
