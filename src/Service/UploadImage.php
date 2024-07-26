<?php

namespace app\Service;

class UploadImage
{
    public function upload(){

        $filePath = STORAGE_PATH . '/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $filePath);

    }
    private function isJpgFile($file)
    {
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']);
    }


}