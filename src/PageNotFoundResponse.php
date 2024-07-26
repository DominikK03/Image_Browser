<?php

namespace app;

use app\Enums\CodeStatus;
use app\Enums\ContentType;

class PageNotFoundResponse extends Response
{
    public function __construct()
    {
        parent::__construct(View::make('error/404'), ContentType::text, CodeStatus::NotFound->value);
    }

}