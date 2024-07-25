<?php

namespace app;

use app\Attributes\Route;
use app\Exceptions\RouteNotFoundException;
use app\Responses\RouteNotFoundResponse;
use ReflectionClass;
use app\Request;


class Router
{
    private array $routes = [];

    public function __construct()
    {
    }

    public function registerControllers(array $controllers)
    {
        foreach($controllers as $controller) {
            $reflectionController = new \ReflectionClass($controller);

            foreach($reflectionController->getMethods() as $method) {
                $attributes = $method->getAttributes(Route::class, \ReflectionAttribute::IS_INSTANCEOF);

                foreach($attributes as $attribute) {
                    $route = $attribute->newInstance();

                    $this->register($route->method, $route->routePath, $controller);
                }
            }
        }
    }

    public function register(string $requestMethod, string $route, string $controller): self
    {
        $this->routes[$requestMethod][$route] = $controller;

        return $this;
    }



    public function routes(): array
    {
        return $this->routes;
    }

    public function resolve(Request $request)
    {
        $route = explode('?', $request->getPath())[0];
        $controllerInfo = $this->routes[$request->getMethod()][$route] ?? null;

        if (! $controllerInfo) {
            return new RouteNotFoundResponse();
        }

        $controllerClass = $controllerInfo['controller'];
        $controllerMethod = $controllerInfo['method'];

        if (! class_exists($controllerClass) || ! method_exists($controllerClass, $controllerMethod)) {
            return new RouteNotFoundResponse();
        }

        $controller = new $controllerClass();

        return $controller->$controllerMethod($request);
    }


}