<?php

namespace app\Responeses;

use app\Enums\ContentType;
use app\ResponseInterface;

class Response implements ResponseInterface
{
    public function __construct(
            private string $content,
            private ContentType $contentType,
            private  int $statusCode = 200,
    )
    {
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode = http_response_code($this->statusCode);
    }

    public function getContentType() : ContentType
    {
        return $this->contentType;
    }
}