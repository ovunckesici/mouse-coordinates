<?php

namespace Doranetyazillim\MouseCoordinates\Handlers\SVG;

class OpenSvg implements Sentence
{
    public function __construct(
        protected int $width,
        protected int $height,
        protected int $ratio
    ) {}

    public function sentence(): string
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ' . $this->width . ' ' . $this->height . '">';
    }
}