<?php

namespace controllers;

class Router
{
    private array $routes = [];

    public function AddRoute(string $path, string $method, $controller)
    {
        $this->path = $path;
        $this->method = $method;
        $this->routes[$method][$path] = $controller;
    }



    public function getController(Request $request): ResponseInterface
    {
        $path = $request->getPath();
        $method = $request->getMethod();

      if (array_key_exists($path, $this->routes[$method])) {
          $controller = $this->routes[$method][$path];

        return $controller;
      } else {
            throw new \Exception('404 Not Found for URI: ' . $path);
        }
    }

}