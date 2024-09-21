<?php

namespace app\Core\HTTP\Request;

use AllowDynamicProperties;

#[AllowDynamicProperties] class UploadFileRequest extends Request
{
    private string $imageName;
    private string $imageTmpName;
    private string $imageType;
    private int $imageSize;


    public function __construct(Request $request)
    {
      $this->request = $request;
    }
    public function fromRequest(): void
    {
        $this->imageName = $this->request->getFileParam('image', 'name');
        $this->imageTmpName = $this->request->getFileParam('image', 'tmp_name');
        $this->imageType = $this->request->getFileParam('image', 'type');
        $this->imageSize = $this->request->getFileParam('image', 'size');
    }
    public function getImageName(): string
    {
        return $this->imageName;
    }

    public function getImageTmpName(): string
    {
        return $this->imageTmpName;
    }

    public function getImageType(): string
    {
        return $this->imageType;
    }

    public function getImageSize(): int
    {
        return $this->imageSize;
    }


}
