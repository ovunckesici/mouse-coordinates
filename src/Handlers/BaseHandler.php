<?php

namespace Doranetyazillim\MouseCoordinates\Handlers;

use Doranetyazillim\MouseCoordinates\Contracts\Response;
use Doranetyazillim\MouseCoordinates\Screen;

abstract class BaseHandler implements Response
{
    protected ?Screen $screen;

    protected array $coordinates;

    public function __construct(?Screen $screen, array $coordinates = [])
    {
        $this->screen = $screen;
        $this->coordinates = $coordinates;
    }
}