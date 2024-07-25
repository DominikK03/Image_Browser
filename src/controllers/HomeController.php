<?php

namespace app\controllers;


use app\Attributes\Route;
use app\Enums\CodeStatus;
use app\Enums\ContentType;
use app\Responses\HtmlResponse;
use app\Responses\Response;
use app\Responses\ResponseInterface;
use app\View;

class HomeController
{
    #[Route('/','GET')]
    public function index(): ResponseInterface
    {
        return new HtmlResponse( View::make('home-view')->render());
    }

}
