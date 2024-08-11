<?php

namespace app\Factories;

use app\Models\Image;

interface ImageFactory
{
    public function createImage(string $imageName, string $imageTmpName, string $imageType, int $imageSize) : Image;

}