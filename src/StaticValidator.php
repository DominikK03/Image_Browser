<?php

namespace app;

use app\Exceptions\DirectoryNotFoundException;
use app\Exceptions\FileExistException;
use app\Exceptions\FileIsntImageException;
use app\Exceptions\ImageExistException;
use app\Exceptions\NotProperSizeException;
use app\Service\ImageRepository;

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
    public static function assertAlreadyExists(string $fileName)
    {
        $imageRepository = new ImageRepository();
        $imageRepository->getImagesFromFolder(STORAGE_PATH);
        if (in_array($fileName, (array)$imageRepository))
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