<?php

namespace app\Service;

use AllowDynamicProperties;
use app\Exception\DirectoryNotFoundException;

#[AllowDynamicProperties] class StorageData
{
    private array $images;

    public function __construct(string $repositoryPath)
    {
        $this->images = [];
        $this->repository = $repositoryPath;
    }


    /**
     * @throws DirectoryNotFoundException
     */
    public function getImagesFromFolder(): array
    {
        if (is_dir($this->repository))
        {
            $imagesDirectory = opendir($this->repository);
            while (($file = readdir($imagesDirectory)) !== false)
            {
                if ($file !== '.' && $file !== '..')
                {
                    $this->images[] = STORAGE_PATH . '/' . $file;
                }

            }
            closedir($imagesDirectory);
        }else {
            throw new DirectoryNotFoundException();
        }

        return $this->images;
    }

}