<?php

namespace app\Repository;

use app\Model\Image;

interface UploadRepositoryInterface
{
    public function uploadImage(Image $uploadImage);

}