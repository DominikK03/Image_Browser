<?php

namespace app\Repositories;

use app\Models\Image;

class UploadRepository
{
    public function uploadImage(Image $uploadImage)
    {
        move_uploaded_file(
            $uploadImage->getImageTmpName(),
            STORAGE_PATH . '/' . $uploadImage->getImageName()
        );

    }
}