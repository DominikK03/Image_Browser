<?php

namespace app\controllers;


use app\Attributes\Route;
use app\Request;
use app\Responeses\HtmlResponse;
use app\ResponseInterface;
use app\View;


class HomeController
{

    public function __construct()
    {
    }

    #[Route('/','GET')]
    public function index(Request $request): ResponseInterface
    {
        return new HtmlResponse(View::make('home-view')->render());

    }

}
