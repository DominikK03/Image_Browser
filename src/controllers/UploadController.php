<?php

namespace app\controllers;

use app\Attributes\Route;
use app\Enums\CodeStatus;
use app\Enums\ContentType;
use app\Exceptions\DirectoryNotFoundException;
use app\Exceptions\FileIsntImageException;
use app\Exceptions\ImageExistException;
use app\Exceptions\NotProperSizeException;
use app\Repositories\UploadRepository;
use app\Request;
use app\Responeses\HtmlResponse;
use app\Responeses\RedirectResponse;
use app\Responeses\Response;
use app\ResponseInterface;
use app\Services\StorageData;
use app\Services\UploadService;
use app\View;


class UploadController
{
    private UploadService $image;

    public function __construct(UploadService $uploadImage)
    {
        $this->image = $uploadImage;
    }

    #[Route('/upload', 'get')]
    public function uploadView(Request $request): ResponseInterface
    {
        if ($request->getQuery()) {
            $queryKey = array_keys($request->getQuery())[0];
            $queryParam = $request->getQueryParams("uploadStatus") ?? null;
            $queryParam = str_replace("-", " ", $queryParam);
            $queryParam = str_replace("failed ", "", $queryParam);
            $query = array($queryKey => $queryParam);
            return match ($queryParam) {
                "file isnt image",
                "image already exist",
                "image hasnt proper size",
                "succeed" => new HtmlResponse(View::make('upload-view', $query))
            };
        } else {
            return new HtmlResponse(View::make('upload-view'));
        }
    }

    /**
     * @throws DirectoryNotFoundException
     */
    #[Route('/upload/uploadimage', 'POST')]
    public function upload(Request $request): ResponseInterface
    {
        $imageData = array(
            'imageName' => $request->getFileParam('image', 'name'),
            'imageTmpName' => $request->getFileParam('image', 'tmp_name'),
            'imageType' => $request->getFileParam('image', 'type'),
            'imageSize' => $request->getFileParam('image', 'size')
        );

        try {
            $uploadImage = new UploadRepository();
            $uploadImage->uploadImage(
                $this->image->setImageData(
                    $imageData['imageName'],
                    $imageData['imageTmpName'],
                    $imageData['imageType'],
                    $imageData['imageSize']
                )
            );
        } catch (FileIsntImageException) {
            return new RedirectResponse('/upload', ["uploadStatus" => "failed-file-isnt-image"]);
        } catch (ImageExistException) {
            return new RedirectResponse('/upload', ["uploadStatus" => "failed-image-already-exist"]);
        } catch (NotProperSizeException) {
            return new RedirectResponse('/upload', ["uploadStatus" => "failed-image-hasnt-proper-size"]);
        }
        return new RedirectResponse("/upload", ["uploadStatus" => "succeed"]);

    }

}