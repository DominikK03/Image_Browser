<?php

namespace app\controllers;

use app\Attributes\Route;
use app\Enums\CodeStatus;
use app\Enums\ContentType;
use app\Exceptions\DirectoryNotFoundException;
use app\Exceptions\FileIsntImageException;
use app\Exceptions\ImageExistException;
use app\Exceptions\NotProperSizeException;
use app\Request;
use app\Responeses\HtmlResponse;
use app\Responeses\RedirectResponse;
use app\Responeses\Response;
use app\ResponseInterface;
use app\Service\ImageRepository;
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
        $queryParam = $request->getQueryParams("uploadStatus");


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
        try {
            $this->image->upload($imageName, $imageTmpName, $imageType, $imageSize);
        } catch (FileIsntImageException){
            return new RedirectResponse('/upload', ["uploadStatus" => "failed-file-isnt-image"]);
        } catch (ImageExistException){
            return new RedirectResponse('/upload', ["uploadStatus" => "failed-image-already-exist"]);
        } catch (NotProperSizeException) {
            return new RedirectResponse('/upload', ["uploadStatus" => "failed-image-hasnt-proper-size"]);
        }
        return new RedirectResponse("/upload", ["uploadStatus" => "succeed"]);

    }

}