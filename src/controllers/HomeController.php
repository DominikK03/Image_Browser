<?php

namespace app\controllers;


use AllowDynamicProperties;
use app\Attributes\Route;
use app\Repositories\DisplayRepository;
use app\Request;
use app\Responeses\HtmlResponse;
use app\ResponseInterface;
use app\Services\DisplayService;
use app\Services\StorageData;
use app\View;


#[AllowDynamicProperties] class HomeController
{
    public function __construct(DisplayService $displayService)
    {
        $this->displayService = $displayService;
    }

    #[Route('/','GET')]
    public function index(Request $request): ResponseInterface
    {

        $repo = new DisplayRepository($this->displayService);
        ddump($repo->displayImage());
        return new HtmlResponse(View::make('home-view'));

    }

}
