<?php

namespace app\Responses;

use app\Enums\CodeStatus;
use app\Enums\ContentType;

class HtmlResponse extends Response
{
    public function __construct(protected string $content)
    {
        parent::__construct(ContentType::text, $content, CodeStatus::OK->value);
    }

}