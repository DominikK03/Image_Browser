<?php

namespace app\Service;

use app\Exceptions\DirectoryNotFoundException;
use app\StaticValidator;

class ImageRepository
{
    private array $images;


    /**
     * @throws DirectoryNotFoundException
     */
    public function getImagesFromFolder($dirPath): array
    {
        if (is_dir($dirPath))
        {
            $imagesDirectory = opendir($dirPath);
            while (($file = readdir($imagesDirectory)) !== false)
            {
                if ($file !== '.' && $file !== '..')
                {
                    $this->images[] = $file;
                }

            }
            closedir($imagesDirectory);
        }else {
            throw new DirectoryNotFoundException();
        }

        return $this->images;
    }

}