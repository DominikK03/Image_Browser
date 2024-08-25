<?php

namespace app\Services;

use app\StaticValidator;

class ImageValidator
{
    public function validateImage(string $imageName, string $imageType, int $imageSize): void
    {
        StaticValidator::assertIsImage($imageType);
        StaticValidator::assertAlreadyExists($imageName);
        StaticValidator::assertIsProperSize($imageSize);
    }
}