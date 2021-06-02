<?php

namespace Doranetyazillim\MouseCoordinates;

class Coordinates
{
    protected ?Screen $screen = null;

    protected array $coordinates = [];

    public function __construct(string $data)
    {
        $this->handle($data);
    }

    protected function splitLines(string $data): array
    {
        return explode("\n", $data);
    }

    protected function setScreen(string $header): Screen
    {
        return Screen::make(str_replace('ï»¿', '', $header));
    }

    protected function setPoint(string $coordinates): Point
    {
        return Point::make($coordinates);
    }

    public function handle(string $data): void
    {
        $split = $this->splitLines($data);

        collect($split)->each(function ($line, $index) {
            if ($index === 0) {
                $this->screen = $this->setScreen($line);
            } else {
                $this->coordinates[] = $this->setPoint($line);
            }
        });
    }

    public function screen(): ?Screen
    {
        return $this->screen;
    }

    public function coordinates(): array
    {
        return $this->coordinates;
    }
}