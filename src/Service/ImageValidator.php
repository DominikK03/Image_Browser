<?php

namespace app\Service;

use app\Utils\StaticValidator;

class ImageValidator
{
    public function validateImage(string $imageName, string $imageType, int $imageSize): void
    {
        StaticValidator::assertIsImage($imageType);
        StaticValidator::assertAlreadyExists($imageName);
        StaticValidator::assertIsProperSize($imageSize);

    }
}