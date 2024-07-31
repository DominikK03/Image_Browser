<?php

namespace app\Service;

use app\Exceptions\FileNotFoundException;

class FileSystem
{
    public function readFile($filePath)
    {
        if(file_exists($filePath))
        {
            return file_get_contents($filePath);
        } else
        {
          throw new FileNotFoundException();
        }
    }

    public function deleteFile($filePath)
    {
        if(file_exists($filePath))
        {
            unlink($filePath);
        } else
        {
            throw new FileNotFoundException();
        }

    }


}