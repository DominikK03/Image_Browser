<?php

namespace controllers;

class Router
{
    private array $routes = [];

    public function AddRoute(Request $request, $controller)
    {
        $path = $request->getPath();
        $method = $request->getMethod();
        $this->routes[$method][$path] = $controller;
    }

    public function GetRoutes(){
        return $this->routes;
    }

    public function getController(Request $request): ? Controller
    {
        $path = $request->getPath();
        $method = $request->getMethod();

      if (array_key_exists($path, $this->routes[$method])) {
          $controller = $this->routes[$method][$path];

          return new Controller();

      } else {
            throw new \Exception('404 Not Found for URI: ' . $path);
        }
    }

}