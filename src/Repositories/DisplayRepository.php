<?php

namespace app\Repositories;

use AllowDynamicProperties;
use app\Models\Image;
use app\Services\DisplayService;
use app\Services\StorageData;

#[AllowDynamicProperties] class DisplayRepository
{
    public function __construct(DisplayService $displayService)
    {
        $this->displayService = $displayService;
    }

    public function displayImage() : Image
    {
        $images = $this->displayService->getImages();
        $imageObjects = [];
        foreach ($images as $image)
        {
                $imageObjects[] = new Image($image['name'],$image['tmpname'],$image['type'],$image['size'],);
        }

        ddump($imageObjects);
    }

}