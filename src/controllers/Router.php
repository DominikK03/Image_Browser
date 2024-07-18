<?php

namespace controllers;

class Router extends Request
{
    private array $routes = [];

    private function AddRoute($method, $path, $controller, $action)
    {
        $method->getMethod();
        $path->getPath();
        $this->routes[$method][$path] = ['controller' => $controller, 'action' => $action];
    }

    public function get($path, $controller, $action){
        $this->AddRoute($this->setMethod('GET'), $path, $controller, $action);
    }

    public function post($path, $controller, $action){
        $this->AddRoute($this->setMethod('POST'), $path, $controller, $action);
    }

    public function dispatch(Request $request)
    {
        $path = $request->getPath();
        $method = $request->getMethod();

      if (array_key_exists($path, $this->routes)) {
          $controller = $this->routes[$method][$path]['controller'];
          $action = $this->routes[$method][$path]['action'];

          $controller = new $controller();
          $controller->$action();

      } else {
            throw new \Exception('404 Not Found for URI: ' . $path);
        }
    }

}