<?php

namespace app\Services;

use AllowDynamicProperties;
use app\Factories\ImageFactory;
use app\Factories\UploadFactory;
use app\Models\Image;
use app\Models\UploadImage;
use app\StaticValidator;


#[AllowDynamicProperties] class UploadService
{
    private UploadFactory $uploadFactory;
    public function __construct(UploadFactory $uploadFactory)
    {
        $this->uploadFactory = $uploadFactory;
    }

    public function setImageData(string $imageName, string $imageTmpName, string $imageType, int $imageSize): Image
    {
        $this->validateImage($imageName, $imageType, $imageSize);
        return $this->uploadFactory->createImage($imageName,$imageTmpName,$imageType,$imageSize);
    }

    public function validateImage(string $imageName, string $imageType, int $imageSize): void
    {
        StaticValidator::assertIsImage($imageType);
        StaticValidator::assertAlreadyExists($imageName);
        StaticValidator::assertIsProperSize($imageSize);
    }


}