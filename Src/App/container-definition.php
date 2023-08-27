<?php

declare(strict_types=1);

use Framework\TemplateEngine;
use App\config\paths;
use App\Services\ValidatorService;

return [
    TemplateEngine::class => fn () => new TemplateEngine(paths::VIEW),
    ValidatorService::class => fn () => new ValidatorService(),



];
