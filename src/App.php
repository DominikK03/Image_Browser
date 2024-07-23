<?php

namespace app;

use app\Exceptions\RouteNotFoundException;

class App
{


    public function __construct(protected Router $router, protected array $request)
    {
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], strtoupper($this->request['method']));
        } catch (RouteNotFoundException) {
            http_response_code(404);
            echo Response::make('error/404');
        }
    }
}