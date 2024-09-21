<?php

namespace app\Controller;

use AllowDynamicProperties;
use app\Core\HTTP\Attribute\Route;
use app\Core\HTTP\Response\HtmlResponse;
use app\Core\HTTP\Response\ResponseInterface;
use app\Request\HomePageRequest;
use app\Service\ImageService;
use app\Util\TemplateRenderer;
use app\View\HomeView;
use app\View\ImageGalleryView;
use app\View\UploaderView;

#[AllowDynamicProperties]
class MainPageController
{
    public function __construct(ImageService $service, TemplateRenderer $renderer)
    {
        $this->service = $service;
        $this->renderer = $renderer;
    }

    #[Route('/', 'GET')]
    public function homeView(HomePageRequest $request): ResponseInterface
    {
        $uploadStatus = "";
        if ($request->getQuery()) {
            $queryParam = $request->getUploadStatus();
            $queryParam = str_replace("-", " ", $queryParam);
            $queryParam = str_replace("failed ", "", $queryParam);
            $uploadStatus = strtoupper($queryParam);
            }
        $galleryView = new ImageGalleryView(['{images}'=>$this->service->getImageNames()]);
        $uploaderView = new UploaderView(['uploadStatus' => $uploadStatus]);
        $homeView = new HomeView($galleryView, $uploaderView);
        return new HtmlResponse($homeView->renderWithRenderer($this->renderer));
    }

}