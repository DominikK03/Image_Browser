<?php

namespace app\Response;

use app\Enum\ContentType;

interface ResponseInterface
{
    public function getContent() : string;
    public function getStatusCode() : int;
    public function getContentType(): ContentType;

}