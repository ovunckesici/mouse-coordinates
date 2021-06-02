<?php

namespace Doranetyazillim\MouseCoordinates\Handlers;

use Doranetyazillim\MouseCoordinates\Handlers\SVG\OpenSvg;
use Doranetyazillim\MouseCoordinates\Handlers\SVG\Path;
use Doranetyazillim\MouseCoordinates\Point;

class SvgHandler extends BaseHandler
{
    protected string $sentence = '';

    public function handle(): self
    {
        if ($this->screen && $this->coordinates) {
            $this->sentence .= (new OpenSvg(
                $this->screen->width(),
                $this->screen->height(),
                $this->screen->ratio()
            ))
                ->sentence();

            $this->makeGroup()->each(function ($group) {
                $coords = '';

                collect($group)->each(function (Point $item) use (&$coords) {
                    $coords .= "{$item->x()},{$item->y()} ";
                });

                $this->sentence .= (new Path($coords))->sentence();
            });

            $this->sentence .= '</svg>';
        }

        return $this;
    }

    protected function makeGroup(): \Illuminate\Support\Collection
    {
        $coords = collect($this->coordinates);

        $group = 0;
        $split = [];

        $coords->each(function (Point $item) use (&$split, &$group) {
            if ($item->type() === 2) {
                $group++;
            } else {
                $split[$group][] = $item;
            }
        });

        return collect($split);
    }

    public function toResponse(): mixed
    {
        $this->handle();

        return $this->sentence;
    }
}