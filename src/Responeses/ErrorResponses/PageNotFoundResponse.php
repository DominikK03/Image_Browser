<?php

namespace app\Responeses\ErrorResponses;

use app\Enums\CodeStatus;
use app\Enums\ContentType;
use app\Responeses\Response;
use app\View;

class PageNotFoundResponse extends Response
{
    public function __construct()
    {
        parent::__construct(View::make('error/404'), ContentType::text, CodeStatus::NotFound->value);
    }

}