<?php

namespace app\Repository;

use app\Model\Image;

class UploadRepository implements UploadRepositoryInterface
{
    public function uploadImage(Image $uploadImage)
    {
        move_uploaded_file(
            $uploadImage->getImageTmpName(),
            STORAGE_PATH . '/' . $uploadImage->getImageName()
        );

    }
}