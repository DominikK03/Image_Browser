<?php

namespace app\Responses;

use app\Enums\ContentType;

interface ResponseInterface
{
    public function getContent() : string;
    public function getStatusCode() : int;
    public function getContentType() : ContentType;

}