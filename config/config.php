<?php

return [
    /**
     * Default handler
     */
    'default' => \Doranetyazillim\MouseCoordinates\Handlers\SvgHandler::class,

    /**
     * Options
     */
    'handlers' => [
        'svg' => \Doranetyazillim\MouseCoordinates\Handlers\SvgHandler::class,
    ],
];