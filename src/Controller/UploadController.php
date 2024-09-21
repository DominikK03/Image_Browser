<?php

namespace app\Controller;

use AllowDynamicProperties;
use app\Core\HTTP\Attribute\Route;
use app\Core\HTTP\Response\RedirectResponse;
use app\Core\HTTP\Response\ResponseInterface;
use app\Exception\FileIsntImageException;
use app\Exception\ImageExistException;
use app\Exception\NotProperSizeException;
use app\Repository\UploadRepositoryInterface;
use app\Request\UploadFileRequest;
use app\Service\UploadService;


#[AllowDynamicProperties] class UploadController
{

    public function __construct(UploadService $service,
                                UploadRepositoryInterface $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }


    #[Route('/uploadimage', 'POST')]
    public function upload(UploadFileRequest $request): ResponseInterface
    {
        try {
            $this->repository->uploadImage(
                $this->service->setImageData(
                    $request->getImageName(),
                    $request->getImageTmpName(),
                    $request->getImageType(),
                    $request->getImageSize()
                )
            );


        } catch (FileIsntImageException) {
            return new RedirectResponse('/', ["uploadStatus" => "failed-file-isnt-image"]);
        } catch (ImageExistException) {
            return new RedirectResponse('/', ["uploadStatus" => "failed-image-already-exist"]);
        } catch (NotProperSizeException) {
            return new RedirectResponse('/', ["uploadStatus" => "failed-image-hasnt-proper-size"]);
        }
        return new RedirectResponse("/", ["uploadStatus" => 'succeed']);

    }


}