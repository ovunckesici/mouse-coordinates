<?php

namespace Doranetyazillim\MouseCoordinates;

use Doranetyazillim\MouseCoordinates\Contracts\Response;
use Doranetyazillim\MouseCoordinates\Handlers\BaseHandler;

class MouseCoordinates
{
    protected string $fallback = 'default';

    protected array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    protected function responder(?Screen $screen, array $coordinates = [], string $key = 'default'): BaseHandler
    {
        if (isset($this->config['handlers'][$key])) {
            $class = $this->config['handlers'][$key];
        } else {
            $class = $this->config[$this->fallback];
        }

        return new $class($screen, $coordinates);
    }

    public function make(?string $data = null, string $key = 'default'): ?Response
    {
        if (! $data) {
            return null;
        }

        $coordinates = new Coordinates($data);

        if (! $coordinates->screen() || ! $coordinates->coordinates()) {
            return null;
        }

        return $this->responder(
            $coordinates->screen(),
            $coordinates->coordinates(),
            $key
        );
    }
}
