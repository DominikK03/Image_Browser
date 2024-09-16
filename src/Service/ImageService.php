<?php

namespace app\Service;

use AllowDynamicProperties;
use app\Exception\DirectoryNotFoundException;
use app\Model\Image;
use app\Repository\ImageRepository;

#[AllowDynamicProperties] class ImageService
{
    public function __construct(ImageRepository $repository)
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
                $names[] = $image->getImageName();
            }
        return $names;
    }

    /**
     * @throws DirectoryNotFoundException
     */



}