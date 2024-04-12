<?php

declare(strict_types=1);

namespace App\Container;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    protected array $instances;

    public function get(string $id)
    {
        if (!$this->has($id)) {
            return null;
        }

        return $this->instances[$id]($this);
    }

    public function has(string $id): bool
    {
        return isset($this->instances[$id]);
    }

    public function set(string $id, callable $callable): void
    {
        $this->instances[$id] = $callable;
    }
}
