<?php

namespace app\Factories;

use app\Models\Image;

class UploadFactory
{

    public function createImage(string $imageName, string $imageTmpName, string $imageType, int $imageSize): Image
    {
        return new Image($imageName, $imageTmpName, $imageType, $imageSize);
    }
}