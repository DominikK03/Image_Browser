<?php

namespace app;

use app\Exceptions\DirectoryNotFoundException;
use app\Exceptions\FileExistException;
use app\Service\ImageRepository;

class StaticValidator
{
    public static function isImage($file) : bool
    {
      $allowedTypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
      if (in_array($file['type'], $allowedTypes)){
          return true;
      }
      return false;
    }

    /**
     * @throws DirectoryNotFoundException
     */
    public static function alreadyExists($file) : bool
    {
        $imageRepository = new ImageRepository();
        $imageRepository->getImagesFromFolder(STORAGE_PATH);
        var_dump($imageRepository);
        if (in_array($file['name'], (array)$imageRepository))
        {
            return true;
        }
        return false;
    }

    public static function isProperSize($file): bool
    {
        if ($file['size'] < 1000000) {
            return true;
        } else {
            return false;
        }
    }
}