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
        $imageName = $request->getFileParam('image','name');
        $imageTmpName = $request->getFileParam('image','tmp_name');
        $imageType = $request->getFileParam('image','type');
        $imageSize = $request->getFileParam('image','size');

        $this->image->upload($imageName, $imageTmpName, $imageType, $imageSize);

        return new HtmlResponse("Tak");
    }

}