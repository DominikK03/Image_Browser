<?php

namespace app\Service;

use app\Exceptions\DirectoryNotFoundException;
use app\Responeses\HtmlResponse;
use app\ResponseInterface;
use app\StaticValidator;


class UploadImage
{
    /**
     * @throws DirectoryNotFoundException
     */
    public function upload(string $imageName, string $imageTmpName, string $imageType, int $imageSize): void
    {
        try {
            StaticValidator::assertAlreadyExists($imageName);
            StaticValidator::assertIsImage($imageType);
            StaticValidator::assertIsProperSize($imageSize);
            move_uploaded_file(
              $imageTmpName,
              STORAGE_PATH . '/' . $imageName
            );
        } catch (\Exception $e){
            echo $e->getMessage();
        }

    }


}