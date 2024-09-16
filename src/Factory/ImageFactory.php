<?php

namespace app\Factory;

use app\Model\Image;

class ImageFactory
{

    public function createImage(string $imageName, string $imageTmpName, string $imageType, int $imageSize): Image
    {
        return new Image($imageName, $imageTmpName, $imageType, $imageSize);
    }

    public function createImagesFromArray(array $images) : array
    {
        $imageObjects = [];

        foreach($images as $image)
        {
            $imageObjects[] = $this->createImage($image['name'],$image['path'],$image['type'],$image['size']);
        }

        return $imageObjects;
    }
}