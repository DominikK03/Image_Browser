<?php

namespace app;

use AllowDynamicProperties;
use app\Exceptions\RouteNotFoundException;

#[AllowDynamicProperties] class Kernel
{


    public function __construct(protected array $container)
    {
    }

    public function handle(Request $request): ResponseInterface
    {
        try {
            $routeData = $this->container[Router::class]->resolve($request);
            $controller = $this->container[$routeData->getController()];
            $controllerMethod = $routeData->getMethod();
            $controller->$controllerMethod($request);


        } catch (RouteNotFoundException) {
            return new PageNotFoundResponse();
        }
    }
}