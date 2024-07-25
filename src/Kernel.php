<?php

namespace app;

use app\Exceptions\RouteNotFoundException;
use app\Responses\ResponseInterface;

class Kernel
{


    public function __construct(protected array $container)
    {
    }

    public function handle(Request $request) : ResponseInterface
    {
        try {
            $controller = $this->container[Router::class]->resolve($request);


        } catch (RouteNotFoundException) {
            return new RouteNotFoundException();
        }
    }
}