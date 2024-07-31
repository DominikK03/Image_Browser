<?php

namespace app\controllers;

use app\Attributes\Route;
use app\Enums\CodeStatus;
use app\Enums\ContentType;
use app\Exceptions\DirectoryNotFoundException;
use app\Request;
use app\Responeses\HtmlResponse;
use app\Responeses\Response;
use app\ResponseInterface;
use app\Service\UploadImage;
use app\View;


class UploadController
{
    private UploadImage $image;
    public function __construct(UploadImage $uploadImage)
    {
        $this->image = $uploadImage;
    }

    #[Route('/upload','get')]
    public function uploadView(Request $request) : ResponseInterface
    {
        return new HtmlResponse(View::make('upload-view'));
    }

    /**
     * @throws DirectoryNotFoundException
     */
    #[Route('/upload/uploadimage', 'POST')]
    public function upload(Request $request) : ResponseInterface
    {
        $this->image->upload();
        var_dump($this->image->upload());
        return new HtmlResponse("Tak");
    }

}