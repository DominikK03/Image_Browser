<?php

namespace app\Controller;

use AllowDynamicProperties;
use app\Attribute\Route;
use app\Exception\FileIsntImageException;
use app\Exception\ImageExistException;
use app\Exception\NotProperSizeException;
use app\Repository\UploadRepository;
use app\Request;
use app\Response\HtmlResponse;
use app\Response\RedirectResponse;
use app\Response\ResponseInterface;
use app\Service\ImageCollector;
use app\Service\ImageService;
use app\Service\UploadService;
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