<?php

namespace app\controllers;

use app\Attributes\Route;
use app\HtmlResponse;
use app\Request;
use app\ResponseInterface;
use app\Service\UploadImage;
use app\View;


class UploadController
{
    public function __construct()
    {
    }

    #[Route('/upload','get')]
    public function upload(Request $request) : ResponseInterface
    {
        return new HtmlResponse(View::make('upload-view'));
    }
}