<?php

namespace app\controllers;

use AllowDynamicProperties;
use app\Attributes\Route;
use app\Exceptions\FileIsntImageException;
use app\Exceptions\ImageExistException;
use app\Exceptions\NotProperSizeException;
use app\Repositories\UploadRepository;
use app\Request;
use app\Responeses\HtmlResponse;
use app\Responeses\RedirectResponse;
use app\Responeses\ResponseInterface;
use app\Services\ImageCollector;
use app\Services\ImageService;
use app\Services\UploadService;
use app\View;


#[AllowDynamicProperties] class UploadController
{

    public function __construct(UploadService $uploadImage,
                                UploadRepository $newImage)
    {
        $this->newImage = $newImage;
        $this->image = $uploadImage;
    }


    #[Route('/uploadimage', 'POST')]
    public function upload(Request $request): ResponseInterface
    {
        $imageData = array(
            'imageName' => $request->getFileParam('image', 'name'),
            'imageTmpName' => $request->getFileParam('image', 'tmp_name'),
            'imageType' => $request->getFileParam('image', 'type'),
            'imageSize' => $request->getFileParam('image', 'size')
        );

        try {
            $this->newImage->uploadImage(
                $newImage = $this->image->setImageData(
                    $imageData['imageName'],
                    $imageData['imageTmpName'],
                    $imageData['imageType'],
                    $imageData['imageSize']
                )
            );


        } catch (FileIsntImageException) {
            return new RedirectResponse('/', ["uploadStatus" => "failed-file-isnt-image"]);
        } catch (ImageExistException) {
            return new RedirectResponse('/', ["uploadStatus" => "failed-image-already-exist"]);
        } catch (NotProperSizeException) {
            return new RedirectResponse('/', ["uploadStatus" => "failed-image-hasnt-proper-size"]);
        }
        return new RedirectResponse("/", []);

    }


}