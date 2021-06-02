<?php

namespace Doranetyazillim\MouseCoordinates;

class Point
{
    protected float $x = 0.0;

    protected float $y = 0.0;

    protected int $type = 0;

    protected ?string $time = '';

    public function __construct(float $x, float $y, int $type = 0, ?string $time = '')
    {
        $this->x = $x;
        $this->y = $y;
        $this->type = $type;
        $this->time = $time;
    }

    public static function make(string $coordinates, string $separator = ';'): self
    {
        $coordinates = explode($separator, $coordinates);

        return new self(
            (float) @$coordinates[0],
            (float) @$coordinates[1],
            (int) @$coordinates[2],
            @$coordinates[3]
        );
    }

    public function x(): float
    {
        return $this->x;
    }

    public function y(): float
    {
        return $this->y;
    }

    public function type(): int
    {
        return $this->type;
    }

    public function time(): string
    {
        return $this->time;
    }
}