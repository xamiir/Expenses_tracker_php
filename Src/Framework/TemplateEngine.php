<?php

declare(strict_types=1);

namespace Framework;


class TemplateEngine
{
    private array $globalTemplateData = [];
    public function __construct(private string $basePath)
    {
    }

    public function render(string $template, array $data = [])
    {
        extract($data, EXTR_SKIP);
        // include "{$this->basePath}/{$template}";
        extract($this->globalTemplateData, EXTR_SKIP);

        // this resolves the path to the template
        include $this->resolve($template);
    }
    public function resolve(string $path)
    {
        return "{$this->basePath}/{$path}";
    }

    public function addGlobal(string $key, mixed $value)
    {
        $this->globalTemplateData[$key] = $value;
    }
}
