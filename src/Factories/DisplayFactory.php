<?php

namespace app\Factories;

use app\Models\DisplayImage;
use app\Models\Image;

class DisplayFactory implements ImageFactory
{

    public function createImage(string $imageName, string $imageTmpName, string $imageType, int $imageSize): Image
    {
        return new DisplayImage();
    }
}