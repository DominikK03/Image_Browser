<?php

namespace app\Responeses;

use app\Enums\ContentType;

class HtmlResponse extends Response
{
    public function __construct(string $content)
    {
        parent::__construct($content, ContentType::text);
    }
}