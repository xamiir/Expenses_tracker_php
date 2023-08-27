<?php

declare(strict_types=1);

use Framework\TemplateEngine;
use App\config\paths;

return [
    TemplateEngine::class => function () {
        return new TemplateEngine(paths::VIEW);
    }
];
