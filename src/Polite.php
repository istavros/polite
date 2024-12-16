<?php

declare(strict_types=1);

namespace Istavros\Polite;

class Polite
{
    public function __construct(private mixed $object)
    {
    }

    public static function make(mixed $object): Polite
    {
        return new static($object);
    }

    public static function wrap(mixed $object): Polite
    {
        return static::make($object);
    }

    public function couldYouPlease(): Polite
    {
        return $this;
    }

    public function __call($name, $arguments)
    {
        return $this->resolve()->{$name}(...$arguments);
    }

    public function __get($name)
    {
        return $this->resolve()->{$name};
    }

    private function resolve()
    {
        if (is_callable($this->object)) {
            $this->object = call_user_func($this->object);
        }

        if (!is_object($this->object)) {
            $this->object = new $this->object;
        }

        return $this->object;
    }
}