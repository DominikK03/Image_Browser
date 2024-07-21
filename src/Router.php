<?php

namespace app;

class Router
{
    private array $routes = [];

    public function AddRoute(string $route, string $method, callable|array $controller) : self
    {
        $this->routes[$method][$route] = $controller;
        return $this;
    }
    public function get(string $route,  callable|array $controller) : self
    {
        return $this->AddRoute($route, 'GET', $controller);
    }
    public function post(string $route, callable|array $controller) : self
    {
        return $this->AddRoute($route, 'POST', $controller);
    }


    public function getController(string $requestURI, string $method)
    {

        $route = explode('?', $requestURI)[0];
        $method = strtoupper($method);
        $controller = $this->routes[$method][$route] ?? null;

        if (! $controller){
            throw new \Exception('Page Not Found',404);
        }
        if (is_callable($controller)){
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


    }

}