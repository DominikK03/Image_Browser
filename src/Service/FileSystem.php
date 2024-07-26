<?php

namespace app\Service;

use app\Exceptions\FileNotFoundException;

class FileSystem
{
    private array $files;

    public function getFiles(): array
    {
        return $this->files;
    }



    private function isJpgFile($file)
    {
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']);
    }


}