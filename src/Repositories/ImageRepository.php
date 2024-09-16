<?php

namespace app\Repositories;

use AllowDynamicProperties;
use app\Exceptions\DirectoryNotFoundException;
use app\Factories\ImageFactory;
use app\Models\Image;
use app\Services\ImageService;
use app\Services\StorageData;

#[AllowDynamicProperties] class ImageRepository
{

    public function __construct(StorageData $storageData, ImageFactory $factory)
    {
        $this->storage = $storageData;
        $this->factory = $factory;

    }

    /**
     * @throws DirectoryNotFoundException
     */
    public function getImageObjects(): array
    {
        $storageData = $this->storage->getImagesFromFolder();
        $images = [];
        foreach ($storageData as $image)
        {
            $imageData = [
                'name' => basename($image),
                'type' => mime_content_type($image),
                'path' => $image,
                'size' => filesize($image)
            ];
            $images[] = $imageData;
        }
        return $this->factory->createImagesFromArray($images);
    }

}