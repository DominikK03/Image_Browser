<?php

namespace app\Responses;

use app\View;

class RouteNotFoundResponse
{
    public function __construct()
    {
        return View::make('error/404')->render();
    }
}