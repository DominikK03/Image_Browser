<?php

namespace app\Factories;

use app\Models\Image;
use app\Models\UploadImage;

class UploadFactory implements ImageFactory
{

    public function createImage(string $imageName, string $imageTmpName, string $imageType, int $imageSize): Image
    {
        return new UploadImage($imageName, $imageTmpName, $imageType, $imageSize);
    }
}