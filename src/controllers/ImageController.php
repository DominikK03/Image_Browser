<?php

namespace app\controllers;

use AllowDynamicProperties;
use app\Attributes\Route;
use app\Request;
use app\Responeses\HtmlResponse;
use app\Responeses\ResponseInterface;
use app\Services\ImageService;
use app\TemplateRenderer;
use app\View;

#[AllowDynamicProperties] class ImageController
{
    public function __construct(ImageService $service, TemplateRenderer $renderer, UploadController $uploadController)
    {
        $this->service = $service;
        $this->renderer = $renderer;
        $this->uploadController = $uploadController;
    }

    #[Route('/','GET')]
    public function imageView(Request $request): ResponseInterface
    {
        $images = $this->service->getImageNames();
        return $this->renderer->renderHtmlResponse('home-view', ['images' => $images]);
    }

}