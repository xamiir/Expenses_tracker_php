<?php

declare(strict_types=1);

namespace Framework;


class TemplateEngine
{
    public function __construct(private string $basePath)
    {
    }

    public function render(string $template, array $data = [])
    {
        extract($data, EXTR_SKIP);
        // include "{$this->basePath}/{$template}";

        // this resolves the path to the template
        include $this->resolve($template);
    }
    public function resolve(string $path)
    {
        return "{$this->basePath}/{$path}";
    }
}
