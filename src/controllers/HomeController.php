<?php

namespace app\controllers;


use app\Attributes\Route;
use app\HtmlResponse;
use app\Request;
use app\ResponseInterface;
use app\Service\UploadImage;
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
