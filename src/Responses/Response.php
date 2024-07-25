<?php

namespace app\Responses;

use app\Enums\CodeStatus;
use app\Enums\ContentType;

class Response implements ResponseInterface
{

    public function __construct(protected ContentType $contentType, protected string $content, protected int $status = 200 )
    {
        $this->contentType = $contentType;
        $this->status = 200;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getStatusCode(): int
    {
        return $this->status;
    }

    public function getContentType(): ContentType
    {
        return $this->contentType;
    }
}