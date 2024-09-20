<?php

namespace app\Utils;

use app\Exception\DirectoryNotFoundException;
use app\Exception\FileExistException;
use app\Exception\FileIsntImageException;
use app\Exception\ImageExistException;
use app\Exception\NotProperSizeException;
use app\Service\StorageData;

class StaticValidator
{
    /**
     * @throws FileIsntImageException
     */
    public static function assertIsImage(string $fileType)
    {
      $allowedTypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
      if (!in_array($fileType,$allowedTypes)){
          throw new FileIsntImageException();
      }
    }

    /**
     * @throws DirectoryNotFoundException
     * @throws ImageExistException
     */
    public static function assertAlreadyExists(string $fileName, $repository = new StorageData(STORAGE_PATH))
    {
        $files = $repository->getImagesFromFolder();
        if (in_array($fileName, $files))
        {
            throw new ImageExistException();
        }
    }

    /**
     * @throws NotProperSizeException
     */
    public static function assertIsProperSize(int $fileSize)
    {
       if(!($fileSize < 1000000)){
           throw new NotProperSizeException();
       }
    }

}