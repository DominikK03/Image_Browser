<?php

namespace controllers;

class Controller implements ControllerInterface
{

    public function handle(Request $request): ResponseInterface
    {
        $response = new Response();

        return $response;
    }
}