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
    public function upload()
    {
        if (isset($_POST['submit'])) {
            $image = $_FILES['image'];
            var_dump($image);
            if (StaticValidator::isImage($image)) {
                if (StaticValidator::isProperSize($image)) {
                    if (!StaticValidator::alreadyExists($image)) {
                        move_uploaded_file(
                                $image['tmp_name'],
                                STORAGE_PATH.$image['name']
                        );
                    }
                }
            }
        }
    }


}