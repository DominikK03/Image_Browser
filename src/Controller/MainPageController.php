<?php

namespace app\Controller;

use AllowDynamicProperties;
use app\Attribute\Route;
use app\Request;
use app\Response\HtmlResponse;
use app\Response\ResponseInterface;
use app\Service\ImageService;
use app\TemplateRenderer;
use app\View;
use app\View\HomeView;
use app\View\ImageGalleryView;
use app\View\UploaderView;

#[AllowDynamicProperties] class MainPageController
{
    public function __construct(ImageService $service, TemplateRenderer $renderer)
    {
        $this->service = $service;
        $this->renderer = $renderer;
    }

    #[Route('/', 'GET')]
    public function homeView(Request $request): ResponseInterface
    {
        $homeView = new HomeView(new ImageGalleryView(['{images}'=>$this->service->getImageNames()]), new UploaderView());
        if ($request->getQuery()) {
            $queryKey = array_keys($request->getQuery())[0];
            $queryParam = $request->getQueryParams("uploadStatus") ?? null;
            $queryParam = str_replace("-", " ", $queryParam);
            $queryParam = str_replace("failed ", "", $queryParam);
            $query = array($queryKey => $queryParam);
            return match ($queryParam) {
                "file isnt image",
                "image already exist",
                "image hasnt proper size"
                => new HtmlResponse($homeView->renderWithRenderer($this->renderer))
            };
        } else {
            return new HtmlResponse($homeView->renderWithRenderer($this->renderer));
        }
    }

}