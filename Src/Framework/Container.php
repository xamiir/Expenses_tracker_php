<?php

declare(strict_types=1);

namespace Framework;

use ReflectionClass;

use Framework\Exceptions\ContainerExceptions;
use ReflectionNamedType;
use ReflectionType;

class Container
{
    private array $definitions = [];

    public function addDefinitions(array $newDefinitions)
    {
        $this->definitions = [...$this->definitions, ...$newDefinitions];
    }

    public function resolve(string $className)
    {
        $reflection = new ReflectionClass($className);

        if (!$reflection->isInstantiable()) {
            throw new ContainerExceptions("{$className} is not instantiable");
        }

        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return new $className;
        }

        $parms = $constructor->getParameters();

        if (count($parms) === 0) {
            return new $className;
        }

        $dependencies = [];

        foreach ($parms as $parm) {
            $name = $parm->getName();
            $type = $parm->getType();
        }
        if (!$type) {
            throw new ContainerExceptions("failed to resolve class for {$className} because of missing type hint for {$name}");
        }
        if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
            throw new ContainerExceptions("failed to resolve class for {$className} because of missing type hint for {$name}");
        }
        $dependencies[] = $this->get($type->getName());

        return $reflection->newInstanceArgs($dependencies);
    }

    public function get(string $id)
    {
        if (!array_key_exists($id, $this->definitions)) {
            throw new ContainerExceptions("{$id} is not defined");
        }

        $factory = $this->definitions[$id];
        $dependency = $factory($this);

        return $dependency;
    }
}
