<?php

namespace app\Services;

use AllowDynamicProperties;


#[AllowDynamicProperties] class DisplayService
{
    public function __construct(StorageData $storageData)
    {
        $this->storageData = $storageData;
    }

    public function getImages() : array
    {
        $storageData = $this->storageData->getImagesFromFolder();
        $images = [];
        foreach ($storageData as $image) {
            $imageData = [
                'name' => basename($image),
                'type' => mime_content_type($image),
                'tmpname' => $image,
                'size' => filesize($image)
            ];
            $images[] = $imageData;
        }
        return $images;
    }
}