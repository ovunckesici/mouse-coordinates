<?php

namespace Doranetyazillim\MouseCoordinates\Handlers\SVG;

class Path implements Sentence
{
    public function __construct(
        protected string $coords
    ) {}

    public function sentence(): string
    {
        return '<polyline points="' . $this->coords . '" style="fill:none;stroke:black;stroke-width:3" />';
    }
}