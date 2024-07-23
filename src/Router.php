<?php

namespace app;

use app\Attributes\Request;
use app\Exceptions\RouteNotFoundException;
use ReflectionClass;


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
                $attributes = $method->getAttributes(Request::class, \ReflectionAttribute::IS_INSTANCEOF);

                foreach($attributes as $attribute) {
                    $route = $attribute->newInstance();

                    $this->register($route->method, $route->routePath, [$controller, $method->getName()]);
                }
            }
        }
    }

    public function register(string $requestMethod, string $route, callable|array $controller): self
    {
        $this->routes[$requestMethod][$route] = $controller;

        return $this;
    }



    public function routes(): array
    {
        return $this->routes;
    }

    public function resolve(string $requestUri, string $requestMethod)
    {
        $route = explode('?', $requestUri)[0];
        $controller = $this->routes[$requestMethod][$route] ?? null;

        if (! $controller) {
            throw new RouteNotFoundException();
        }

        if (is_callable($controller)) {
            return call_user_func($controller);
        }

        if (is_array($controller)){
            [$class, $method] = $controller;
            if (class_exists($class)){
                $class = new $class();
                if (method_exists($class, $method)){
                    return call_user_func_array([$class, $method], []);
                }
            }
        }


        throw new RouteNotFoundException();
    }


}