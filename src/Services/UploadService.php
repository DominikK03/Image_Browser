<?php

namespace app\Services;

use AllowDynamicProperties;
use app\Factories\ImageFactory;
use app\Factories\UploadFactory;
use app\Models\Image;


#[AllowDynamicProperties] class UploadService
{
    public function __construct(UploadFactory $uploadFactory, ImageValidator $imageValidator)
    {
        $this->uploadFactory = $uploadFactory;
        $this->validate = $imageValidator;
    }

    public function setImageData(string $imageName, string $imageTmpName, string $imageType, int $imageSize): Image
    {
        $this->validate->validateImage($imageName, $imageType, $imageSize);
        return $this->uploadFactory->createImage($imageName, $imageTmpName, $imageType, $imageSize);
    }


}