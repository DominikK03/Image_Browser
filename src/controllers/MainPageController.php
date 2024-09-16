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

#[AllowDynamicProperties] class MainPageController
{
    public function __construct(ImageService $service, TemplateRenderer $renderer, UploadController $uploadController)
    {
        $this->service = $service;
        $this->renderer = $renderer;
        $this->uploadController = $uploadController;
    }

    #[Route('/', 'GET')]
    public function imageView(Request $request): ResponseInterface
    {
        $images = $this->service->getImageNames();
        if ($request->getQuery()) {
            $queryKey = array_keys($request->getQuery())[0];
            $queryParam = $request->getQueryParams("uploadStatus") ?? null;
            $queryParam = str_replace("-", " ", $queryParam);
            $queryParam = str_replace("failed ", "", $queryParam);
            $query = array($queryKey => $queryParam);
            $data = array_merge($query, ['images' => $images]);
            return match ($queryParam) {
                "file isnt image",
                "image already exist",
                "image hasnt proper size" => $this->renderer->renderHtmlResponse('home-view', $data)
            };
        } else {
            return $this->renderer->renderHtmlResponse('home-view', ['images' => $images]);
        }
    }

}