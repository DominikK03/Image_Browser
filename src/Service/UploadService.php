<?php

namespace app\Service;

use AllowDynamicProperties;
use app\Factory\ImageFactory;
use app\Model\Image;


#[AllowDynamicProperties] class UploadService
{
    public function __construct(ImageFactory $imageFactory, ImageValidator $imageValidator)
    {
        $this->imageFactory = $imageFactory;
        $this->validate = $imageValidator;
    }

    public function setImageData(string $imageName, string $imageTmpName, string $imageType, int $imageSize): Image
    {
        $this->validate->validateImage($imageName, $imageType, $imageSize);
        return $this->imageFactory->createImage($imageName, $imageTmpName, $imageType, $imageSize);
    }


}