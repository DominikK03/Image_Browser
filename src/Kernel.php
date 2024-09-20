<?php

namespace app;

use AllowDynamicProperties;
use app\Core\DI\Container;
use app\Core\HTTP\Request;
use app\Core\HTTP\Router;
use app\Exception\RouteNotFoundException;
use app\Response\ErrorResponses\PageNotFoundResponse;
use app\Response\ResponseInterface;

#[AllowDynamicProperties] class Kernel
{


    public function __construct(protected Container $container)
    {
    }

    public function handle(Request $request): ResponseInterface
    {
        try {
            $routeData = $this->container->get(Router::class)->resolve($request);
            $controller = $this->container->get($routeData->getController());
            $controllerMethod = $routeData->getMethod();
            return $controller->$controllerMethod($request);


        } catch (RouteNotFoundException) {
            return new PageNotFoundResponse();
        }
    }
}