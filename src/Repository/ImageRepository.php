<?php

namespace app\Repository;

use AllowDynamicProperties;
use app\Exception\DirectoryNotFoundException;
use app\Factory\ImageFactory;
use app\Model\Image;
use app\Service\ImageService;
use app\Service\StorageData;

#[AllowDynamicProperties] class ImageRepository implements ImageRepositoryInterface
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