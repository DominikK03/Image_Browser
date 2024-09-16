<?php

namespace app\Response;

use app\Enum\ContentType;

class HtmlResponse extends Response
{
    public function __construct(string $content)
    {
        parent::__construct($content, ContentType::text);
    }
}