<?php

namespace app\Service;

use AllowDynamicProperties;
use app\Exception\DirectoryNotFoundException;
use app\Repository\ImageRepositoryInterface;

#[AllowDynamicProperties] class ImageService
{
    public function __construct(ImageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getImagePaths() : array
    {
        $paths = [];
        foreach($this->repository->getImageObjects() as $image)
        {
            $paths[] = $image->getImageTmpName();
        }
        return $paths;
    }

    public function getImageNames():array
    {
        $names = [];
        foreach ($this->repository->getImageObjects() as $image)
            {
                if ($image->getImageName() != '.gitkeep'){
                    $names[] = $image->getImageName();

                }
            }
        return $names;
    }

    /**
     * @throws DirectoryNotFoundException
     */



}