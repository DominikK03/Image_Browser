<?php

namespace app\Services;

use AllowDynamicProperties;
use app\Exceptions\DirectoryNotFoundException;
use app\Models\Image;
use app\Repositories\ImageRepository;

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