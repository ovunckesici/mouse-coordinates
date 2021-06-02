<?php

namespace Doranetyazillim\MouseCoordinates;

class Screen
{
    protected int $width = 0;

    protected int $height = 0;

    protected int $ratio = 0;

    public function __construct(int $width, int $height, int $ratio)
    {
        $this->width = $width;
        $this->height = $height;
        $this->ratio = $ratio;
    }

    public static function make(string $screen, string $separator = ';'): self
    {
        $screen = explode($separator, $screen);

        return new self(
            (float) @$screen[0],
            (float) @$screen[1],
            (int) @$screen[2],
        );
    }

    public function width(): int
    {
        return $this->width;
    }

    public function height(): int
    {
        return $this->height;
    }

    public function ratio(): int
    {
        return $this->ratio;
    }
}